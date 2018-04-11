<div class="content">
    <div class="create-form">
        <div class="create-header">Edit the Post</div>
        <form id="form-edit" name="form-edit" method="post" onsubmit="">
            <?php
            $post = $_GET['id'];
            $link = mysqli_connect("localhost", "root", "", "blog") or die("Ошибка ".mysqli_error($link));
            if (!mysqli_set_charset($link, "utf8")) {
                echo "Ошибка при загрузке набора символов utf8";
                mysqli_error($link);
                exit();
            }
            $query ="select p.title, p.subtitle, p.description from posts as p where p.id_post = '$post'";
            $result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link));
            if($result)
            {
                $rows = mysqli_num_rows($result);
                for ($i = 0; $i < $rows; ++$i) {
                    $row = mysqli_fetch_row($result);
                    echo "<label for=\"edit-title\" class=\"create-label\">Post Title"
                            ."<input type=\"text\" class=\"input input-title\" id=\"edit-title\" name=\"edit-title\" autocomplete=\"off\" value='".$row[0]."'>"
                        ."</label>"
                        ."<label for=\"edit-subtitle\" class=\"create-label\">Post Subtitle"
                            ."<input type=\"text\" class=\"input input-subtitle\" id=\"edit-subtitle\" name=\"edit-subtitle\" autocomplete=\"off\" value='".$row[1]."'>"
                        ."</label>"
                        ."<label for=\"edit-tags\" class=\"create-label\">Tags"
                            ."<input type=\"text\" class=\"input input-tags\" id=\"edit-tags\" name=\"edit-tags\" autocomplete=\"off\"  value=''>"
                            ."<div class=\"date-news create-date\">Please enter comma separated list of tags</div>"
                        ."</label>"
                        ."<label for=\"edit-text\" class=\"create-label\">Post Text"
                            ."<textarea class=\"input input-text\" id=\"edit-text\" name=\"edit-text\">".$row[2]."</textarea>"
                        ."</label>";
                }
            }
            mysqli_close($link);
            ?>
            <div>
                <input type="button" class="create-btn" value="Edit Post" onclick="submitEdit()">
                <input type="button" class="create-btn cancel-btn" value="Cancel" onclick="location.href='index.php'">
            </div>
        </form>
    </div>
</div>

<?php
if (isset($_POST['edit-title']) && isset($_POST['edit-subtitle']) && isset($_POST['edit-text'])) {
    $post = $_GET['id'];
    $title = $_POST['edit-title'];
    $subtitle = $_POST['edit-subtitle'];
    $text = $_POST['edit-text'];
    $link = mysqli_connect("localhost", "root", "", "blog") or die("Ошибка " . mysqli_error($link));
    if (!mysqli_set_charset($link, "utf8")) {
        echo "Ошибка при загрузке набора символов utf8";
        mysqli_error($link);
        exit();
    }
    $query = "update posts set title='$title', subtitle='$subtitle', description='$text' where id_post='$post'";
    $result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link));
    if ($result == 'true') {
        echo "<script>alert('Post successfully edit');
                location.href='index.php'</script>";
    } else {
        echo "<script>alert('Error. Please, try again')</script>";
        mysqli_close($link);
        exit();
    }
}

?>