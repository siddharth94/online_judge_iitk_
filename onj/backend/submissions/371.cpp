#include <bits/stdc++.h>
using namespace std;

#define F(i,n) for(int i=0;i<n;i++)
#define FE(i,n) for(int i=0;i<=n;i++)
#define FR(i,n) for(int i=n;i>0;i--)
#define FRE(i,n) for(int i=n;i>=0;i--)
#define LL long long 

int get()
{
	char c=getchar();
	int x=0,flag=0;
	while ((c<'0'||c>'9')&&c!='-') c=getchar();
	if (c=='-')
	{
		flag=1;
		c=getchar();
	}
	while (c>='0'&&c<='9')
	{
		x=x*10+c-'0';
		c=getchar();
	}
	return flag?(-x):x;
}

int odd[100005],even[100005];

int main()
{
	int n,k,p;
	n = get();
	k = get();
	p = get();
	int x=0,y=0;
	F(i,n)
	{
		int a = get();
		if (a%2 == 0)
			even[x++] = a;
		else
			odd[y++] = a;
	}
//	int even,odd;
	if (k-p > y)
	{
		printf("NO\n");
		return 0;
	}
	else if (k-p <= y)
	{
		if ((y-k+p)%2 == 1)
		{
			printf("NO\n");
			return 0;
		}
		else
		{
			int oddl = y-k+p;
			if (p > x+(oddl/2))
			{
				printf("NO\n");
				return 0;
			}
			else
			{
				int evenleft = x+(oddl/2)-p;
				int oddtoprint = k-p;
				printf("YES\n");
				int i=0;
				while (i < oddtoprint)
				{
					printf("1 %d\n",odd[i++]);
				}
				printf("%d ",1+evenleft+(oddl/2));
				if (x>0)
					printf("%d ",even[x-1]);
				else
					printf("%d %d ",odd[i++],odd[i++]);
				x--;
				bool flag = true;
				int extra = 0;
				while (i<y && extra<evenleft)
				{
					printf("%d %d ",odd[i++],odd[i++]);
						extra++;
				}
				
				int j=0;
				
				if (i<y)
				{
					printf("\n");
					while (i<y)
					{
						printf("2 %d %d\n",odd[i++],odd[i++]);
					}
					while (x--)
						printf("1 %d\n",even[x]);
					return 0;
				}
				else if (extra < evenleft)
				{
					while (extra < evenleft)
					{
						printf("%d ",even[j++]);
						extra++;
					}
				}
				printf("\n");
				while (j<x)
				{
					printf("1 %d\n",even[j++]);
				}
			}
		}
	}

	return 0;
}