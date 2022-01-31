#include<iostream>
#include<cmath>
#include <set>
using namespace std;

int main()
{
    int A;
    cout<<"A = ";
    cin>>A;
    int maxLength=0;
    set<int> distances;


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

                          }

                        }
                    }
                }

            }
        }
    }
    int count=distances.size();
    cout<<maxLength<<"  "<<count<<endl;
}
