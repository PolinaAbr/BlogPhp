function submitEdit() {
    var title = document.forms["form-edit"]["edit-title"].value;
    var subtitle = document.forms["form-edit"]["edit-subtitle"].value;
    var tags = document.forms["form-edit"]["edit-tags"].value;
    var text = document.forms["form-edit"]["edit-text"].value;
    if (title == "") {
        alert("Enter post title");
    } else if (subtitle == "") {
        alert("Enter post subtitle");
    } else if (text == "") {
        alert("Enter post text");
    } else {
        document.getElementById('form-edit').submit();
    }
}