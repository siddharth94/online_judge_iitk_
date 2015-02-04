#include<>

using namespace std;



int mult(int n)
{
	int k=0,carry,sum=0;
	int ar[100000]={1};
	for (int i = 1; i <=n; i++)
		{   
			carry=0;
           for (int j= 0; j <= 100000; j++)
           {
	           	ar[j]=ar[j]*i+carry;
	           	carry=0;
	           	if(ar[j]>10)
				{
					carry=ar[j]/10;
					ar[j]=ar[j]%10;
					
	            }
           }
        }
        for (int l= 0; l <=100000;l++)
        
            sum+=ar[l];
        
        return sum;
}

int main()
{
	int t,n,j=0,sum;
	cin>>t;
	while(t--)
	{
		
        cin>>n;
	    sum=mult(n);

	 cout<<sum<<endl;
	}
	return 0;
}