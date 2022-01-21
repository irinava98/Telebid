#include<iostream>
#include<string>
using namespace std;


int main()
{

 int k,l,r;
 while(true)
 {
    cout<<"k= ";
    cin>>k;
    if(cin.fail())
    {
       cin.clear();
       cin.ignore();
       cout << "You entered not a number. Try again." << endl;
    }
    else if(k<=0 || k>1000)
    {

       cin.clear();
       cin.ignore();
       cout << "You entered a number that is out of range. The range is [0,1000]. Try again." << endl;
    }
    else
    {
        break;
    }
}


 while(true)
 {
    cout<<"l= ";
    cin>>l;
    if(cin.fail())
    {
       cin.clear();
       cin.ignore();
       cout << "You entered not a number. Try again." << endl;
    }
    else if(l<=0 || l>1000)
    {

       cin.clear();
       cin.ignore();
       cout << "You entered a number that is out of range. The range is [0,1000]. Try again." << endl;
    }
    else
    {
        break;
    }
}

 while(true)
 {
    cout<<"r= ";
    cin>>r;
    if(cin.fail())
    {
       cin.clear();
       cin.ignore();
       cout << "You entered not a number. Try again." << endl;
    }
    else if(r<=0 || r>100)
    {

       cin.clear();
       cin.ignore();
       cout << "You entered a number that is out of range. The range is [0,100]. Try again." << endl;
    }
    else
    {
        break;
    }
}


 int strawberries[k][l];
 // at the beggining all the strawberries are healthy
 for(int i=0;i<k;i++)
 {
	 for(int j=0;j<l;j++){
		 strawberries[i][j]=0;
	 }
 }



int n;

while(true)
 {
     cout<<"count of the rotten strawberries 1 or 2  ";
     cin>>n;

    if(cin.fail())
    {
       cin.clear();
       cin.ignore();
       cout << "You entered not a number. Try again." << endl;
    }
    else if(n!=1 && n!=2)
    {

       cin.clear();
       cin.ignore();
       cout << "The count of rotten strawberries should be 1 or 2. Try again." << endl;
    }
    else
    {
        break;
    }
}


 int x1,y1,x2,y2;

 if(n == 1)
 {

    while(true)
     {
        cout<<"x1= ";
        cin>>x1;

        if(cin.fail())
        {
           cin.clear();
           cin.ignore();
           cout << "You entered not a number. Try again." << endl;
        }
        else if(x1<1 || x1>k)
        {

           cin.clear();
           cin.ignore();
           cout << "The coordinate must be in the range [1,"<<k<<"]. Try again." << endl;
        }
        else
        {
            break;
        }
    }




     while(true)
     {
        cout<<"y1= ";
        cin>>y1;

        if(cin.fail())
        {
           cin.clear();
           cin.ignore();
           cout << "You entered not a number. Try again." << endl;
        }
        else if(y1<1 || y1>l)
        {

           cin.clear();
           cin.ignore();
           cout << "The coordinate must be in the range [1,"<<l<<"]. Try again." << endl;
        }
        else
        {
            break;
        }
}

	//we decrease by one because indexes start from zero
	strawberries[x1-1][y1-1]=1;
 }
 else if(n == 2)
 {
     while(true)
     {
        cout<<"x1= ";
        cin>>x1;

        if(cin.fail())
        {
           cin.clear();
           cin.ignore();
           cout << "You entered not a number. Try again." << endl;
        }
        else if(x1<1 || x1>k)
        {

           cin.clear();
           cin.ignore();
           cout << "The coordinate must be in the range [1,"<<k<<"]. Try again." << endl;
        }
        else
        {
            break;
        }
    }




     while(true)
     {
        cout<<"y1= ";
        cin>>y1;

        if(cin.fail())
        {
           cin.clear();
           cin.ignore();
           cout << "You entered not a number. Try again." << endl;
        }
        else if(y1<1 || y1>l)
        {

           cin.clear();
           cin.ignore();
           cout << "The coordinate must be in the range [1,"<<l<<"]. Try again." << endl;
        }
        else
        {
            break;
        }
     }

     while(true)
     {
        cout<<"x2= ";
        cin>>x2;

        if(cin.fail())
        {
           cin.clear();
           cin.ignore();
           cout << "You entered not a number. Try again." << endl;
        }
        else if(x2<1 || x2>k)
        {

           cin.clear();
           cin.ignore();
           cout << "The coordinate must be in the range [1,"<<k<<"]. Try again." << endl;
        }
        else
        {
            break;
        }
    }




     while(true)
     {
        cout<<"y2= ";
        cin>>y2;

        if(cin.fail())
        {
           cin.clear();
           cin.ignore();
           cout << "You entered not a number. Try again." << endl;
        }
        else if(y2<1 || y2>l)
        {

           cin.clear();
           cin.ignore();
           cout << "The coordinate must be in the range [1,"<<l<<"]. Try again." << endl;
        }
        else
        {
            break;
        }
     }


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
  }

   cout<<endl;
   cout<<"The count of the healthy strawberries is : "<<countHealthyStrawberries;

}
