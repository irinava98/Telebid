#include<iostream>
#include<cmath>
#include <set>
using namespace std;

int main()
{


 int A;
 while(true)
 {
    cout<<"A = ";
    cin>>A;
    if(cin.fail())
    {
       cin.clear();
       cin.ignore();
       cout << "You entered not a number. Try again." << endl;
    }
    else if(A<=0 || A>=20000)
    {

       cin.clear();
       cin.ignore();
       cout << "You entered a number that is out of range. The range is (0,20000). Try again." << endl;
    }
    else
    {
        break;
    }
}

    int maxLength=0;
    set<int> distances;
    /**
    int longestX1=0;
	int longestY1=0;
	int longestX2=0;
	int longestY2=0;
	*/
    for(int x1=0;x1<=A;x1++)
    {
        for(int x2=0;x2<=A;x2++)
        {
            for(int y1=0;y1<=A;y1++)
            {
                for(int y2=0;y2<=A;y2++)
                {
                    if(x1!=x2 && y1!=y2)
                    {

                        double distance=sqrt(pow(x1-x2,2)+pow(y1-y2,2));

                        if(distance > 0 && distance==(int)distance)
                        {
                          distances.insert(distance);
                          if(distance > maxLength)
                          {

                              maxLength=distance;
                              /**
                              longestX1=x1;
							  longestY1=y1;
							  longestX2=x2;
							  longestY2=y2;
							  */
                          }

                        }
                    }
                }

            }
        }
    }
    int count=distances.size();
    ///cout<<longestX1<<" "<<longestY1<<" "<<longestX2<<" "<<longestY2<<endl;
    cout<<maxLength<<"  "<<count<<endl;
}
