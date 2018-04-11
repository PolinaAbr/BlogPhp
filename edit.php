<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Creative</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
    <script src="script.js"></script>
</head>
<body>

<div class="page">

    <?php
    session_start();
    if (!isset($_SESSION['session'])){
        echo "<script>alert('You need to login to edit the post')</script>";
        echo "<script>location.href = 'index.php'</script>";
    }
    include "header/header.html";
    include "edit-form/edit-form.php";
    include "login.php";
    include "footer/footer.html";
    ?>

</div>

</body>
</html>