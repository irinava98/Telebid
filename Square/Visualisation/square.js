function sqaure(A)
{
    
    let maxLength=0;
    let distances= new Set();


    for(let x1=0;x1<=A;x1++)
    {
        for(let x2=0;x2<=A;x2++)
        {
            for(let y1=0;y1<=A;y1++)
            {
                for(let y2=0;y2<=A;y2++)
                {
                    if(x1!=x2 && y1!=y2)
                    {

                        let distance=Math.sqrt(Math.pow(x1-x2,2)+Math.pow(y1-y2,2));

                        if(distance > 0 && distance%1==0)
                        {
                          distances.add(distance);
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
    let count=distances.size;
    console.log(maxLength+" "+count);

}

sqaure(4);
