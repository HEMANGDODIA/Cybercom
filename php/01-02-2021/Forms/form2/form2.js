function validateform(){
	if(document.form.firstname.value==""){
		alert("Enter Your Firstname");
		document.form.firstname.focus();
		return false;
	}else if(document.form.password.value==""){
		alert("Enter Your Password");
		document.form.password.focus();
		return false;
	}else if(document.form.password.value.length < 6){
		alert("Password Should be Above 6 character ");
		document.form.password.focus();
		return false;
	}else if(document.form.gender.value==""){
		alert("Select Your Gender");
		return false;
	}else if (document.form.address.value=="") {
		alert("Enter Your Address");
		document.form.address.focus();
		return false;
	}else if(document.form.month.value=="month"){
		alert("Select Your Birth Month");
		return false;
	}else if(document.form.day.value=="day"){
		alert("Select Your Birth day");
		return false;
	}else if(document.form.year.value=="year"){
		alert("Select Your Birth Year");
		return false;
	}else if(checkbox()==0){
		alert("Select Your Games");
		return false;
	}else if(document.form.mstatus.value==""){
		alert("Select Marital Status");
		return false;
	}else if(!(document.form.agrement.checked)){
		alert("Please unsure Your Agrement");
		document.form.agrement.focus();
		return false;

	}else{
		alert("Form Successfully Submited")
		return true;
	}
}

function checkbox(){
	var count=0;
	var game=document.getElementsByName('game[]');
	for(var i=0;i<game.length;i++){
		if (game[i].checked) {
			count=count+1;
		
		}
	}
	return count;
}