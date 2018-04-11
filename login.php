<?php
if (isset($_POST['login']) && isset($_POST['password'])) {
    $login = $_POST['login'];
    $password = $_POST['password'];
    $link = mysqli_connect("localhost", "root", "", "blog") or die("Ошибка " . mysqli_error($link));
    if (!mysqli_set_charset($link, "utf8")) {
        echo "Ошибка при загрузке набора символов utf8";
        mysqli_error($link);
        exit();
    }
    $query = "select * from users where users.login = '$login'";
    $result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link));
    $row = mysqli_fetch_row($result);
    if (empty($row[0])) {
        mysqli_close($link);
        echo "<script>alert('Incorrect credentials')</script>";
        exit();
    } else {
        if ($row[2] == $password) {
            $_SESSION['login'] = $row[1];
            $_SESSION['session'] = $row[0];
        } else {
            mysqli_close($link);
            echo "<script>alert('Incorrect credentials')</script>";
            exit();
        }
    }
}

if (isset($_SESSION['session'])) {
    echo "<script>
    document.getElementById('login').style.display = 'none';
    document.getElementById('logout').style.display = 'block';
    document.getElementById('username').style.display = 'block';
    document.getElementById('username').innerHTML = 'Hello, ".$_SESSION['login']."!';
    document.getElementById('create-post').style.display = 'block';
    if(document.getElementById('create-comment'))
        document.getElementById('create-comment').style.display = 'block';
    var actions = document.getElementsByClassName('actions');
    for (var i = 0; i < actions.length; i++){
        actions[i].style.visibility = 'visible';
    }
    var remove = document.getElementsByClassName('remove-comment');
    for (i = 0; i < remove.length; i++){
        remove[i].style.display = 'block';
    }
    </script>";
}

if (isset($_GET['action']) && $_GET['action'] == 'logout') {
    $_SESSION['login'] = "";
    $_SESSION['session'] = "";
    session_destroy();
    echo "<script>
    location.href = 'index.php';
    document.getElementById('login').style.display = 'block';
    document.getElementById('logout').style.display = 'none';
    document.getElementById('username').style.display = 'none';
    document.getElementById('create-post').style.display = 'none';
    if(document.getElementById('create-comment'))
        document.getElementById('create-comment').style.display = 'none';
    var actions = document.getElementsByClassName('actions');
    for (var i = 0; i < actions.length; i++){
        actions[i].style.visibility = 'hidden';
    }
    var remove = document.getElementsByClassName('remove-comment');
    for (i = 0; i < remove.length; i++){
        remove[i].style.display = 'none';
    }
    </script>";
    exit();
}
?>