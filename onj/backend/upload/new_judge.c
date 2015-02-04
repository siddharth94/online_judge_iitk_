#include <sys/stat.h>
#include <sys/types.h>
#include <signal.h>
#include <unistd.h>
#include <stdio.h>
#include <stdlib.h>
#include <fcntl.h>
#include <time.h> 	
#include <sys/wait.h>
#include <sys/resource.h>

int main(int argc, char ** argv)
{
	struct timeval start, end;
	float mtime, seconds, useconds; 
	// Time limit in milliseconds
	int timelim = atoi(argv[4]) * 1000;
	// File descriptor holders
	int input,output,error,flag;
	// Create new file descriptor reference for stdout
	int oldstdout = dup(1);	
	int child_pid;

	FILE *fp;
	fp = fopen("/var/chroot/tle_check","w");
	fclose(fp);

	gettimeofday(&start, NULL);
	// printf("argv[0]='%s' argv[1]='%s' argv[2]='%s'\n",argv[0],argv[1], argv[2]);
	child_pid = fork();
	if(child_pid ==0)
	{
		// Child Process
		struct rlimit lim,forklim;        
		// Convert 6th command line argument from MB to Bytes
		lim.rlim_cur = atoi(argv[5])*1024*1024;
		lim.rlim_max = lim.rlim_cur;
		if(chdir("/var/chroot") != 0) {
			printf("chroot on /var/chroot failed. Exiting with status 1.");
			return 1;
		}

		output = open(argv[6], O_CREAT|O_TRUNC|O_RDWR, S_IXUSR|S_IRUSR|S_IWUSR|S_IXOTH|S_IROTH|S_IWOTH);
		input = open(argv[2], O_RDWR);

		// Assing the opened files as input and output descriptors
		dup2(input,0);
		dup2(output,1);

		close(input);close(output);

		if (!strcmp(argv[3],"py")) {
			lim.rlim_cur+=29963000;//accomodating space for libraries 
			lim.rlim_max=lim.rlim_cur;
			setrlimit(RLIMIT_AS,&lim);
			forklim.rlim_cur=0;
			forklim.rlim_max=0;
			setrlimit(RLIMIT_NPROC,&forklim);
			execl("/usr/bin/python2.7","dummy",argv[1],(char *)0);
		} else if (!strcmp(argv[3],"zm")) {
			lim.rlim_cur+=29963000;//accomodating space for libraries
			lim.rlim_max=lim.rlim_cur;
			setrlimit(RLIMIT_AS,&lim);
			forklim.rlim_cur=0;
			forklim.rlim_max=0;
			setrlimit(RLIMIT_NPROC,&forklim);
			execl("/usr/bin/python2.7","dummy","zombie.py",argv[1],(char *)0);
		} else if (!strcmp(argv[3],"java")) {
			lim.rlim_cur+=999929963000;//accomodating space for libraries 
			lim.rlim_max=lim.rlim_cur;
			setrlimit(RLIMIT_AS,&lim);
			forklim.rlim_cur=0;
			forklim.rlim_max=0;
			setrlimit(RLIMIT_NPROC,&forklim);
			FILE * ffp = fopen("aj.txt","w");
			fprintf(ffp,"Hello argv[0]='%s' argv[1]='%s' argv[2]='%s'\n",argv[0],argv[1], argv[2]);
			fclose(ffp);
			system("java Main");
			// execl("java","Main",(char *)NULL);
		} else {
			lim.rlim_cur+=4329900;//accomodating space for libraries 
			lim.rlim_max=lim.rlim_cur;
			setrlimit(RLIMIT_AS,&lim);
			forklim.rlim_cur=0;
			forklim.rlim_max=0;
			setrlimit(RLIMIT_NPROC,&forklim);
			FILE * ffp = fopen("aj.txt","w");
			fprintf(ffp,"argv[0]='%s' argv[1]='%s' argv[2]='%s'\n",argv[0],argv[1], argv[2]);
			fclose(ffp);
			execl(argv[1], argv[1], (char *)NULL);
		}
	} else {
		// Parent Process
		struct rusage usage;

   		/*code added by siddharth gupta*/
		int status;

		gettimeofday(&end, NULL);
		seconds  = end.tv_sec  - start.tv_sec;
		useconds = end.tv_usec - start.tv_usec;
		mtime = ((seconds) * 1000 + useconds/1000.0) + 0.5;

		while (mtime <= timelim)
		{
			pid_t result = waitpid(child_pid, &status, WNOHANG);
			if (!WIFEXITED(status))
			{
				FILE * fp;
				fp = fopen ("/var/chroot/tle_check","w");
				fprintf(fp,"RE!!");
				fclose(fp);
				return 0;	
			}
			//pid_t result = waitpid(child_pid, &status, WUNTRACED | WCONTINUED);
			if (result == 0	) 
			{
				// Child still alive
				gettimeofday(&end, NULL);
				seconds  = end.tv_sec  - start.tv_sec;
				useconds = end.tv_usec - start.tv_usec;
				mtime = ((seconds) * 1000 + useconds/1000.0) + 0.5;
				if (mtime>timelim)
				{
					FILE * fp;
					fp = fopen ("/var/chroot/tle_check","w");
					fprintf(fp,"TLE!!");
					fclose(fp);
					kill(child_pid,SIGKILL);
					return 0;
				}
				else continue;
			}	else if (result == -1) {
			    // Error
			    printf("Error");
		  		return 0; 
			}	else {
				// Child exited
				break;
			}
		}

		// Reset back old stdout
		dup2(oldstdout,1);
		FILE * fpe;
		fpe = fopen ("/var/chroot/usage.txt","a");
		fprintf(fpe,"%f\n",mtime);
		fclose(fpe);
		printf("mtime : %f\n", mtime);
	}
	return 0;
}

