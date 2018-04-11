<div class="sidebar">
    <div class="text sidebar-background">
        <div class="header-news sidebar-header">Creative+ Design Blog</div>
        <div class="date-news">Your Bi-Line to go her</div>
        <div class="description">
            Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.
            Vestibulum scelerisque dignissim massa, sed gravida nisi sollicitudin vel.
            Sed nec erat feugiat
        </div>

        <div class="header-news sidebar-header">Recieve Updates</div>
        <div class="message-block">
            <input type="text" class="message sidebar-message" placeholder="Leave Your Email here">
            <i class="fa fa-envelope sidebar-envelope" aria-hidden="true"></i>
            <input type="button" class="sidebar-join" value="Join">
        </div>
        <div class="sidebar-text-small">
            Ut eget metus nibh, nec scelerisque sem.
            Nulla dui purus, pellentesque sit amet rutrum vitae.
        </div>

        <div class="header-news sidebar-header">Recent Posts</div>
        <ul>
            <?php
            $link = mysqli_connect("localhost", "root", "", "blog") or die("Ошибка ".mysqli_error($link));
            if (!mysqli_set_charset($link, "utf8")) {
                echo "Ошибка при загрузке набора символов utf8";
                mysqli_error($link);
                exit();
            }
            $query ="select * from posts order by id_post desc";
            $result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link));
            if($result) {
                $rows = mysqli_num_rows($result);
                if ($rows < 3) {
                    for ($i = 0; $i < $rows; $i++) {
                        $row = mysqli_fetch_row($result);
                        echo "<li class=\"sidebar-li\">"
                                . "<i class=\"fa fa-caret-right sidebar-marker\" aria-hidden=\"true\"></i>"
                                . "<a href='post.php?id=$row[0]' class='resent-posts'>".$row[1]."</a>"
                            . "</li>"
                            . "<div class=\"date-news sidebar-date\">".$row[3]."</div>";
                    }
                } else {
                    for ($i = 0; $i < 3; $i++) {
                        $row = mysqli_fetch_row($result);
                        echo "<li class=\"sidebar-li\">"
                            . "<i class=\"fa fa-caret-right sidebar-marker\" aria-hidden=\"true\"></i>"
                            . "<a href='post.php?id=$row[0]' class='resent-posts'>".$row[1]."</a>"
                            . "</li>"
                            . "<div class=\"date-news sidebar-date\">".$row[3]."</div>";
                    }
                }
            }
            ?>
        </ul>

        <div class="header-news sidebar-header">Popular Tags</div>
        <input type="button" class="tags" value="Cat">
        <input type="button" class="tags" value="Dog">
        <input type="button" class="tags" value="Cats">
        <input type="button" class="tags" value="Dogs">
        <input type="button" class="tags" value="Category">
        <input type="button" class="tags" value="Cat Here">

    </div>
    <div class="text text-1 sidebar-text-1"></div>
    <div class="text text-2 sidebar-text-2"></div>

    <div class="ad"></div>
</div>