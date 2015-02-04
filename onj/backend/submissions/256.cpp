#include<stdio.h>
#include<iostream>
#include<algorithm>
#include<string.h>
#include<math.h>
 
using namespace std;
 
int max(int a, int b)
{
if (a>b)
{return a;}
return b;
}
 
int lcs( char *X, char *Y, int m, int n )
{
   int L[m+1][n+1];
   int i, j;
  
   for (i=0; i<=m; i++)
   {
     for (j=0; j<=n; j++)
     {
       if (i == 0 || j == 0)
         L[i][j] = 0;
  
       else if (X[i-1] == Y[j-1])
         L[i][j] = L[i-1][j-1] + 1;
  
       else
         L[i][j] = max(L[i-1][j], L[i][j-1]);
     }
   }
    
    
   return L[m][n];
}
 
 
int main()
{
	int t;
    scanf("%d",&t);
    while(t)
    {
    char a[501],b[501];
    cin>>a>>b;
    int m= strlen(a), n= strlen(b);
    cout<<lcs(a,b,m,n);
    putchar(0);
    cout << endl;
    t--;
    }
 scanf("%*d");
 
}
