function submitComment() {
    var text = document.forms["form-comment"]["input-comment"].value;
    if (text == "") {
        alert("Enter comment text");
    } else {
        document.getElementById('form-comment').submit();
    }
}
