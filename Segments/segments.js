function segments(n,a,b,c){
	
	let pointsGeorgi=[];
	let pointsGergana=[];
	
	let len=n;
	
	for(let i=1;i<=n;i++){		
		if(i%a==0){
			pointsGeorgi.push(i);
		}
	}
	
	for(let i=len;i>=1;i--){
		if(i%b==0){
			pointsGergana.push(i);
		}
	}
	
	for(let i=0;i<pointsGeorgi.length;i++){
		for(let j=0;j<pointsGergana.length;j++){
			let distance=Math.abs(pointsGeorgi[i]-pointsGergana[j]);
			if(distance==c){
				len-=distance;
			}
		}
	}
	
	console.log(len);
}


segments(10,2,3,1);