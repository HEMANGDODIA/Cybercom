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