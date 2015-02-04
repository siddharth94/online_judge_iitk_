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

int c[100005];

int comp (const void * a, const void * b)
{
  return ( *(int*)a - *(int*)b );
}

int main()
{
	int n,x;
	n = get();
	x = get();
	F(i,n)
		c[i] = get();
	qsort (c,n,sizeof(int),comp);
	LL hours = 0;
	int i = 0;
	while (x>1 && i<n)
	{
		hours += (LL)(c[i]) * x;
		x--;
		i++;
	}
	if (i==n)
	{
		//printf("%lld\n",hours);
		cout << hours << "\n";
		return 0;
	}
	else
	{
		while (i<n)
		{
			hours += (LL)(c[i]);
			i++;
		}
		// printf("%lld\n",hours);
		cout << hours << "\n";
	}
	return 0;
}