window.onload = function(){
    var login = document.getElementById("login");
    var modal = document.getElementById("modal");
    login.onclick = function() {
        modal.style.display = "flex";
    };
    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    };
};

function validateLog() {
    var login = document.forms["form-log"]["login"].value;
    var password = document.forms["form-log"]["password"].value;
    if (login == "" || password == "") {
        return false;
    }
}

function submitLog() {
    var login = document.forms["form-log"]["login"].value;
    var password = document.forms["form-log"]["password"].value;
    if (login == "") {
        alert("Enter login");
    } else if (password == "") {
        alert("Enter password");
    } else {
        document.getElementById('form-log').submit();
    }
}