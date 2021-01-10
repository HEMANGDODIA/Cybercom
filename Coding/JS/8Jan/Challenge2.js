var JTS1,JTS2,JTS3; //create variables for john's team scores
var MTS1,MST2,MST3; //create variables for mark's team scores

JTS1=89;
JTS2=120;
JTS3=103;

MTS1=116;
MST2=94;
MST3=123;

var JTavg,MTavg; // create variables for find average of john's team and mark's team
JTavg=(JTS1+JTS2+JTS3) / 3;
MTavg=(MTS1+MST2+MST3) / 3;

if(JTavg > MTavg)
{
	console.log("For John's & Mark's teams"+" John's teams Wins in average" + " & teams average score is:" + JTavg);
}
else{
	console.log("For John's & Mark's teams"+" Mark's teams Wins in average" + " & teams average score is:" + MTavg);
}
//for step no 3 to change scores of both team and calculate it 
JTS1=120;
JTS2=95;
JTS3=125;

MTS1=89;
MST2=120;
MST3=103;


JTavg=(JTS1+JTS2+JTS3) / 3;
MTavg=(MTS1+MST2+MST3) / 3;

if(JTavg > MTavg)
{
	console.log("After change score For John's & Mark's teams"+" John's teams Wins in average" + " & teams average score is:" + JTavg);
}
else{
	console.log("After change score For John's & Mark's teams"+" Mark's teams Wins in average" + " & teams average score is:" + MTavg);
}

// step 4 for calcuate mary's team average score and winner of aveage score
var MRTS1,MRTS2,MRTS3; //create variables for Mary's team scores
MRTS1=97;
MRST2=134;
MRST3=105;

JTS1=89;
JTS2=120;
JTS3=103;

MTS1=116;
MST2=94;
MST3=123;

var MRTavg; // create variables for find average of mary's team
JTavg=(JTS1+JTS2+JTS3) / 3;
MTavg=(MTS1+MST2+MST3) / 3;
MRTavg=(MRTS1+MRTS2+MRTS3) / 3;

if(MRTavg > MTavg){
	if (MRTavg > JTavg) {
		console.log("For Mary' & John's & Mark's teams"+" Mary's teams Wins in average" + " & teams average score is:" + MRTavg);
	}
	else{
		console.log("For Mary' & John's & Mark's teams"+" John's teams Wins in average" + " & teams average score is:" + JTavg);
	}
}
else{
	console.log("For Mary' & John's & Mark's teams"+" Mark's teams Wins in average" + " & teams average score is:" + MTavg);
}











