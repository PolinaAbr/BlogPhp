<?php
if(isset($_GET['action']) && $_GET['action'] == 'remove') {
    $post = $_GET['id'];
    echo "<script>if (confirm('Do you want to delete this post?')){"
        . "location.assign('post.php?id=" . $post . "&remove=true');"
        . "} else {"
        . "location.assign('post.php?id=" . $post . "');"
        ."}</script>";
}
if (isset($_GET['remove']) && $_GET['remove'] == 'true') {
    $link = mysqli_connect("localhost", "root", "", "blog") or die("Ошибка " . mysqli_error($link));
    if (!mysqli_set_charset($link, "utf8")) {
        echo "Ошибка при загрузке набора символов utf8";
        mysqli_error($link);
        exit();
    }
    $query = "delete from comments where id_post='$post'";
    $result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link));
    $query = "delete from posts where id_post='$post'";
    $result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link));
    echo "<script>window.location.assign('index.php')</script>";
    mysqli_close($link);
}
if (isset($_GET['comment'])) {
    $post = $_GET['id'];
    $comment = $_GET['comment'];
    $link = mysqli_connect("localhost", "root", "", "blog") or die("Ошибка " . mysqli_error($link));
    if (!mysqli_set_charset($link, "utf8")) {
        echo "Ошибка при загрузке набора символов utf8";
        mysqli_error($link);
        exit();
    }
    $query = "delete from comments where id_comment='$comment'";
    $result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link));
    echo "<script>window.location.assign('post.php?id=".$post."')</script>";
    mysqli_close($link);
}

?>