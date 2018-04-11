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
    include "header/header.html";
    include "modal-login/modal-login.html";
    include "post-view/post-view.php";
    include "remove.php";
    include "create-comment.php";
    include "social/social.html";
    include "login.php";
    include "footer/footer.html";
    ?>

</div>

</body>
</html>