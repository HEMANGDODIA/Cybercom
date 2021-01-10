var JMass=60; // John's Mass store in variable JMass(Mass in Kg).
var JHeight=1.65; // John's Height store in variable JHeight(Height in meter).

var MMass=58; // Mark's Mass store in variable MMASS(Mass in Kg).
var MHeight=1.60;// Mark's Height store in variable MHeight(Height in meter).


 JBMI=JMass / (JHeight*JHeight);//calculate John's BMI using given formula 
 console.log("John's BMI is : " + JBMI);

 MBMI=MMass / (MHeight*MHeight);//calculate Mark's BMI using given formula 
 console.log("Mark's BMI is :" + MBMI);

 var higherBMI; // create boolean variable that say mark's BMI is higher than john's BMI
 higherBMI=true;

console.log("Is Mark's BMI is Higher than John's BMI? " + higherBMI); // print higher BMI statement using Boolean variable



