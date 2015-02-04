#include<iostream>
#include<string>

using namespace std;

int palin(string &a,int size)
{
  for (int i = 0,j=size-1; i<=size-1&& j>=0;i++,j--)
  {
  	if(a[i]!=a[j])
  	return 0;
    else
    	continue;
  }
  return 1;
}


int main()
{
	int t,len,count=0;
	string s,s1;
    cin>>t;
    
    while(t--)
       {
       	 count=0;
       	 cin>>s;
         len=s.length();

		         for (int i = 0; i < len; i++)
		             for (int j= 1; j<= len-i; j++)       


		         {
		       
		         	s1=s.substr(i,j);
		         	count=count+palin(s1,j);
		          }
                cout<<count<<endl;
         }
       
       
 return 0;
}
