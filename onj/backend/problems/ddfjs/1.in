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

int t[105];

int main()
{
	int n,d;
	n = get();
	d = get();
	int sum = 0;
	F(i,n)
	{
		t[i] = get();
		sum += t[i];
	}
	sum += 10*(n-1);
	if (sum > d)
		printf("-1\n");
	else
	{
		int jokes = 2*(n-1);
		jokes += (d - sum)/5;
		printf("%d\n",jokes);
	}
	return 0;
}