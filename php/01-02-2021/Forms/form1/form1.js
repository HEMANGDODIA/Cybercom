function validateform(){
	if (document.form.name.value=="") {
		alert("Enter Your Name");
		document.form.name.focus();
		return false;
	}else if(document.form.password.value==""){
		alert("Enter Your Password");
		document.form.password.focus();
		return false;
	}else if(document.form.password.value.length < 6){
		alert("Your Password Should Be Above 6 Character");
		document.form.password.focus();
		return false;
	}else if(document.form.address.value==""){
		alert("Enter Your Address");
		document.form.address.focus();
		return false;
	}else if(checkbox()==0){
		alert("Select Your Game");
		return false;
	}else if(document.form.gender.value==""){
		alert("Select Your Gender");
		return false;
	}else if(document.form.age.value=="-1"){
		alert("Select Age");
		fileInput.value='';
		return false;
	}else if(document.form.file.value==""){
		alert("Upload file");
		return false;
	}else if(!filevalidate()){
		return false;
	}else{
		alert("Form submited Successfully");
		return (true);
	}

}



function filevalidate(){
	var fileInput=document.getElementsById('file');
	var filepath=fileInput.value;

	var allowedextentions=  /(\.jpg|\.jpeg|\.png|\.gif|\.pdf)$/i;

	if (!allowedextentions.exec(filepath)) {
		alert("Pls Select Valid file");
		return false;
	}else{
		return true;
	}

}


function checkbox(){
	var count=0;
	var game=document.getElementsByName('game[]');
	for (var i=0;i<game.length;i++ ) {
		if(game[i].checked){
			count=count+1;
		}
	}
	return count;
}

/*function radiobt(){
	var count=0;
	var gender=document.getElementsByName('gender');
	for (var i=;i<gender.length;i++){
		if(gender[i].checked){
			count=count+1;
		}
	}
	return count;
}*/