#include <stdio.h>

void long_division(int a , int b , char r[100])
{

	int rem [1000] , cal , i ,j=0,k=0,l=0,flag=1;
	char temp[100];
	
	rem[0]=a;
	
	do
	{
		j++;
		
		while(a<b)a=a*10;
		
		//printf("%d ",a);
		
		cal=a/b ;
		rem[j] = a%b;
		temp[j-1]=(char)( cal+'0') ;
		//printf("  %c",temp[j]);
		for(i=0;i<j;i++)
		{
			if(rem[i]==rem[j]) {
			flag=0 ; break; printf("%d %d    ",i,j); }
			//else printf("%d %d %d        ",cal,rem[i],rem[j]);
		}
	
		a=rem[j] ;
		//printf("%d  ",a);
		
	
	}while(a!=0 && flag!=0);
	
	//printf("%d %d    ",i,j);
	
	if(i<j)
	{
		for(k=0,l=0;k<i;k++,l++)
		r[l]=temp[k];
		
		r[l++]='(' ;
		
		for(;k<j;k++,l++)
		{
		r[l]=temp[k];
		//printf("%c ",r[l]);
		}
		r[l++]=')' ;
		
		
	}
	
	else
	for(k=0,l=0;k<=j;k++,l++) r[k]=temp[k];
	
	r[l]='\0';
}





int main ()
{
	int a , b,n ;
	char ch,r[100] ;
	
	printf("Enter 1 or 2: ");
	scanf ("%c",&ch);
	
	switch(ch)
	{
		case '1' : 
		
		printf("Enter a: "); scanf("%d",&a);
		printf("Enter b: "); scanf("%d",&b);
		
		long_division(a%b,b,r);
		
		printf("Value of  %d/%d: %d.%s\n",a,b,a/b,r);
		
		break;
		
		
		printf("Enter n: "); scanf("%d",&n);
		
		longest_cycle(n);
		
		case '2' : break;
	}
	
	 
}
