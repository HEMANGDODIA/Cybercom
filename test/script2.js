var array2= [];

function adduserElement() {
    var sName = document.getElementById('name').value;
    var sEmail = document.getElementById('email').value;
    var sPwd = document.getElementById('password').value;
    var sbdate = document.getElementById('birthdate').value;
    
   
  

    var person = {
        name: sName,
        email: sEmail,
        password: sPwd,
        birthdate: sbdate,
            
        
    };

    if (localStorage.getItem('array2')) {
        array2 = JSON.parse(localStorage.getItem('array2'));
    }

    array2.push(person);
    console.log(array2);
    localStorage.setItem("array2", JSON.stringify(array2));
    console.log("add data")

    alert(sname + " " + semail + " " + bdate + " added at index " + array2.length);
};
