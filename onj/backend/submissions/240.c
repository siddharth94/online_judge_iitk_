#include <stdio.h>
#include <string.h>
int main ()
{
	int i=1 ,sum =0 ;
	char ch= 'e',c ;
	i = 1/0;
	printf("Enter the string ");
	scanf ("%c",&c);
	
	while(c!='\n')
	{
		if(c!=ch)
		{
			i++;
			ch=c;
		}
		sum+=i;
		scanf("%c",&c);
		
	}
	
	printf("Required sum: %d\n",sum);
	
	return 0;	
}

