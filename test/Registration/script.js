var array = [];

function addElement() {
    var sName = document.getElementById('name').value;
    var sEmail = document.getElementById('email').value;
    var sPwd = document.getElementById('password').value;
    var sCity = document.getElementById('city').value;
    var sState = document.getElementById('state').value;
    var person = {
        name: sName,
        email: sEmail,
        password: sPwd,
        city: sCity,
        sState: sState,
    };

    if (localStorage.getItem('array')) {
        array = JSON.parse(localStorage.getItem('array'));
    }

    array.push(person);
    console.log(array);
    localStorage.setItem("array", JSON.stringify(array));

    alert(sname + " " + semail + " " + bdate + " added at index " + array.length);
};

function login() {
    event.preventDefault();
    console.log("login function called...");
    var sEmail = document.getElementById('uemail').value;
    var sPwd = document.getElementById('upassword').value;
    console.log(sEmail);
    console.log(sPwd);

    if (localStorage.getItem('array')) {
        array = JSON.parse(localStorage.getItem('array'));
    }
    console.log(array.length);
    for (i = 0; i < array.length; i++) {
        if (!sEmail.localeCompare(array[i].email) && !sPwd.localeCompare(array[i].password)) {
            console.log("Logged in...");

            // window.location.replace("http://www.w3schools.com");
            window.location.href = '../Dashboard.html';
        }
        console.log("incorrect uername & password...");
    }
}