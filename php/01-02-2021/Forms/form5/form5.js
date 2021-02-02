function validateform(){
	if(document.form.email.value==""){
		alert("Enter Your email");
		document.form.name.focus();
		return false;
	}else if(document.form.password.value==""){
		alert("Enter Your password");
		document.form.password.focus();
		return false;
	}else if(document.form.password.value.length < 8){
		alert("Password Should be above 8 char..");
		return false;
	}else{
		alert("Form Successfuly Submited");
		return true;
	}
}	