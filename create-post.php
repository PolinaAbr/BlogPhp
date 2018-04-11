<?php
if (isset($_POST['input-title']) && isset($_POST['input-subtitle']) && isset($_POST['input-text'])) {
    $title = $_POST['input-title'];
    $subtitle = $_POST['input-subtitle'];
    $text = $_POST['input-text'];
    $user = $_SESSION['session'];
    $date = date('jS F Y');
    $image = "news-1.png";
    $link = mysqli_connect("localhost", "root", "", "blog") or die("Ошибка " . mysqli_error($link));
    if (!mysqli_set_charset($link, "utf8")) {
        echo "Ошибка при загрузке набора символов utf8";
        mysqli_error($link);
        exit();
    }
    $query = "insert into posts (title, subtitle, date, id_user, description, image) values('$title','$subtitle','$date','$user', '$text', '$image')";
    $result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link));
    if ($result == 'true') {
        echo "<script>alert('Post successfully created')</script>";
        echo "<script>location.href = 'index.php'</script>";
    } else {
        echo "<script>alert('Error. Please, try again')</script>";
        mysqli_close($link);
        exit();
    }
}
?>