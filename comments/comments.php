<div class="post-comments">
    <div class="text post-text">
        <div class="create-header comment">Comments</div>
        <?php
        $post = $_GET['id'];
        $link = mysqli_connect("localhost", "root", "", "blog") or die("Ошибка ".mysqli_error($link));
        if (!mysqli_set_charset($link, "utf8")) {
            echo "Ошибка при загрузке набора символов utf8";
            mysqli_error($link);
            exit();
        }
        $query ="select u.login, c.date, c.comment, c.id_comment  
                                 from comments as c 
                                 inner join users as u on c.id_user = u.id_user
                                 inner join posts as p on c.id_post = p.id_post
                                 where c.id_post = '$post'
                                 order by id_comment";
        $result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link));
        if($result)
        {
            $rows = mysqli_num_rows($result);
            for ($i = 0; $i < $rows; ++$i) {
                $row = mysqli_fetch_row($result);
                $comment = $row[3];
                echo "<div class=\"comment-block\">"
                        ."<div class=\"user-image\"><i class=\"fa fa-user\" aria-hidden=\"true\"></i></div>"
                        ."<div class=\"comment-body\">"
                            ."<div class=\"comment-header\">"
                                ."<div class=\"user-comment\">".$row[0]."</div>"
                                ."<div class=\"date-comment\">".$row[1]."</div>"
                                ."<a href='post.php?id=$post&comment=$comment' class=\"remove-comment\"><i class=\"fa fa-times\" aria-hidden=\"true\"></i></a>"
                            ."</div>"
                            ."<div class=\"text-comment\">".$row[2]."</div>"
                        ."</div>"
                    ."</div>";
            }
        }
        mysqli_close($link);
        ?>

        <div class="create-comment" id="create-comment">
            <form id="form-comment" name="form-comment" method="post">
                <label for="input-comment" class="comment-label">
                    Leave your comment
                    <textarea class="input input-text input-comment" id="input-comment" name="input-comment"></textarea>
                </label>
                <div>
                    <input type="button" class="create-btn cancel-btn comment-btn" value="Leave comment" onclick="submitComment()">
                </div>
            </form>
        </div>
    </div>
</div>