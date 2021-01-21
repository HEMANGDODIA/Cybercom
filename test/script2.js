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


function login() {
    event.preventDefault();
    console.log("login function called...");
    var sEmail = document.getElementById('uemail').value;
    var sPwd = document.getElementById('upassword').value;
    console.log(sEmail);
    console.log(sPwd);

    if (localStorage.getItem('array2')) {
        array = JSON.parse(localStorage.getItem('array2'));
    }
    console.log(array2.length);
    for (i = 0; i < array.length; i++) {
        if (!sEmail.localeCompare(array2[i].email) && !sPwd.localeCompare(array2[i].password)) {
            console.log("Logged in...");

            // window.location.replace("http://www.w3schools.com");
            window.location.href = '../sub-user.html';
        }
        console.log("incorrect uername & password...");
    }
}

