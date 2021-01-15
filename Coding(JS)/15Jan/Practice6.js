var number=parseInt(prompt("Enter a number for upto how many step long fibonacci series:"));

var n0,n1;
n0=0;
n1=1;

for(let i=1;i<=number;i++){
	console.log(n0);
	n2=n0+n1;
	n0=n1;
	n1=n2;

}

