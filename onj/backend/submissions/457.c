#include<stdio.h>

int main()
{
	int t;
	t=1/0;
	scanf ("%d",&t);
	while (t--)
	{
		int a,b;
		scanf("%d %d",&a,&b);
		printf("%d\n",a+b);

	}
	return 0;
}
