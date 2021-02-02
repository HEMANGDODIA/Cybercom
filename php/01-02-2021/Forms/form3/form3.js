function validateform(){
	if(document.form.firstname.value==""){
		alert("Enter Your Firstname");
		document.form.firstname.focus();
		return false;
	}else if(document.form.lastname.value==""){
		alert("Enter Your lastname");
		document.form.password.focus();
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
	}else if(document.form.gender.value==""){
		alert("Select Gender");
		return false;
	}else if(document.form.country.value=="-1"){
		alert("Select Your Country");
		return false;
	}else if(document.form.email.value==""){
		alert("Enter Your E-mail");
		document.form.email.focus();
		return false;
	}else if(document.form.phone.value==""){
		alert("Enter Your Phone");
		document.form.phone.focus();
		return false;
	}else if(document.form.password.value.length < 6){
		alert("Password Should be above 6 char..");
		return false;
	}
	else if(document.form.password.value==""){
		alert("Enter Your password");
		document.form.password.focus();
		return false;
	}else if(document.form.cpassword.value==""){
		alert("Enter Your Confirm Pasword");
		document.form.cpassword.focus();
		return false;
	}else if(document.form.cpassword.value!=document.form.password.value){
		alert("Pasword is not match");
		document.form.cpassword.focus();
		return false;
	}else if(!(document.form.agrement.checked)){
		alert("Please unsure Your Agrement");
		document.form.agrement.focus();
		return false;

	}else{
		alert("Form Successfuly Submited");
		return true;
	}

}