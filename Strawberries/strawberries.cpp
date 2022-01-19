#include<iostream>
using namespace std;

int main()
{
  
 int k,l,r;
 cout<<"k= ";
 cin>>k;
 cout<<"l= ";
 cin>>l;
 int strawberries[k][l];
 // at the beggining all the strawberries are healthy
 for(int i=0;i<k;i++)
 {
	 for(int j=0;j<l;j++){
		 strawberries[i][j]=0;
	 }
 }
 



 cout<<"r= ";
 cin>>r;
 int n;
 cout<<"count of the rotten strawberries 1 or 2  "; 
 cin>>n;
 
 
 
 int x1,y1,x2,y2;
 
 if(n == 1)
 {
	cout<<"x1= ";
    cin>>x1;
    cout<<"y1= ";
    cin>>y1;	
	
	//we decrease by one because indexes start from zero
	strawberries[x1-1][y1-1]=1;
 }
 else if(n == 2)
 {
	cout<<"x1= ";
    cin>>x1;
    cout<<"y1= ";
    cin>>y1;
    cout<<"x2= ";
    cin>>x2;
    cout<<"y2= ";
    cin>>y2;
    	
	strawberries[x1-1][y1-1]=1;
	strawberries[x2-1][y2-1]=1;
 }
 
 for(int day=1;day<=r;day++)
 {
	 for(int i=0;i<k;i++)
	 {
		 for(int j=0;j<l;j++){
			 
			// if strawberry is already rotted 
			if(strawberries[i][j]==day)
            {
				//we walk through its neighbours
				if(i+1 < k)
				{
				  if(strawberries[i+1][j]==0)
                  {
					  strawberries[i+1][j]=day+1;	  
				  }					    
				  
				}
				if(i-1 >=0)
				{
					if(strawberries[i-1][j]==0)
					{
						strawberries[i-1][j]=day+1;
					}
	
				}
				if(j+1 < l)
				{
					if(strawberries[i][j+1]==0)
					{
						strawberries[i][j+1]=day+1;
					}
				
				}
                if(j-1 >=0)
				{
					if(strawberries[i][j-1]==0)
					{
						strawberries[i][j-1]=day+1;
					}
					
				}					
			}				
		 }
	 } 
 }
 
  int countHealthyStrawberries=0;
   
  for(int i=0;i<k;i++)
  {
    for(int j=0;j<l;j++)
    {
		//the healthy strawberries are still with value zero
       if(strawberries[i][j]==0)
       {
          countHealthyStrawberries++;
       }
    }
    cout<<endl;
  }

   cout<<countHealthyStrawberries;   
	
}