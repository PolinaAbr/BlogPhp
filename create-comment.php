<?php
if (isset($_POST['input-comment'])) {
    $post = $_GET['id'];
    $text = $_POST['input-comment'];
    $user = $_SESSION['session'];
    $date = date('jS F Y H:i');
    $link = mysqli_connect("localhost", "root", "", "blog") or die("Ошибка " . mysqli_error($link));
    if (!mysqli_set_charset($link, "utf8")) {
        echo "Ошибка при загрузке набора символов utf8";
        mysqli_error($link);
        exit();
    }
    $query = "insert into comments (id_user, id_post, comment, date) values('$user', '$post', '$text', '$date')";
    $result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link));
    if ($result == 'true') {
        echo "<script>location.href = 'post.php?id=".$post."'</script>";
    } else {
        echo "<script>alert('Error. Please, try again')</script>";
        mysqli_close($link);
        exit();
    }
}
?>