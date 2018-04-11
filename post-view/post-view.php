<div class="content">
    <div>
        <?php
        $post = $_GET['id'];
        $link = mysqli_connect("localhost", "root", "", "blog") or die("Ошибка ".mysqli_error($link));
        if (!mysqli_set_charset($link, "utf8")) {
            echo "Ошибка при загрузке набора символов utf8";
            mysqli_error($link);
            exit();
        }
        $query ="select p.image, p.title, p.date, u.login, p.subtitle, p.description  
                                 from posts as p 
                                 inner join users as u on p.id_user = u.id_user
                                 where p.id_post = '$post'";
        $result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link));
        if($result)
        {
            $rows = mysqli_num_rows($result);
            for ($i = 0; $i < $rows; ++$i) {
                $row = mysqli_fetch_row($result);
                echo "<div class=\"image-news post-image\" style=\"background-image: url('img/".$row[0]."')\">"
                        ."<div class=\"image-border post-image-border\">"
                            ."<div class=\"icon-network post-icon-network\"><i class=\"fa fa-facebook\" aria-hidden=\"true\"></i></div>"
                            ."<div class=\"icon-network post-icon-network\"><i class=\"fa fa-twitter\" aria-hidden=\"true\"></i></div>"
                            ."<a href='edit.php?id=$post' class=\"actions post-actions\"><i class=\"fa fa-pencil\" aria-hidden=\"true\"></i></a>"
                            ."<a href='post.php?id=$post&action=remove' class=\"actions post-actions\"><i class=\"fa fa-times\" aria-hidden=\"true\"></i></a>"
                            ."<div class=\"post-image-bg\">"
                                ."<div class=\"post-image-header\">".$row[1]."</div>"
                            ."</div>"
                        ."</div>"
                    ."</div>"
                    ."<div class=\"text-news post-text-news\">"
                        ."<div class=\"text post-text\">"
                            ."<div class=\"date-news\">".$row[2]." by ".$row[3]."</div>"
                            ."<div class=\"link-news\">".$row[4]."</div>"
                            ."<div class=\"description\">".$row[5]."</div>"
                        ."</div>"
                        ."<div class=\"text text-1 post-text-1\"></div>"
                        ."<div class=\"text text-2 post-text-2\"></div>"
                    ."</div>";
            }
        }
        mysqli_close($link);
        include "comments/comments.php";
        ?>
    </div>
</div> 