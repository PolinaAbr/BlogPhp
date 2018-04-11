function submitCreate() {
    var title = document.forms["form-create"]["input-title"].value;
    var subtitle = document.forms["form-create"]["input-subtitle"].value;
    var tags = document.forms["form-create"]["input-tags"].value;
    var text = document.forms["form-create"]["input-text"].value;
    if (title == "") {
        alert("Enter post title");
    } else if (subtitle == "") {
        alert("Enter post subtitle");
    } else if (text == "") {
        alert("Enter post text");
    } else {
        document.getElementById('form-create').submit();
    }
}
