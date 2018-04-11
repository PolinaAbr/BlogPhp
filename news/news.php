<div class="content">
    <div>
        <?php
        $link = mysqli_connect("localhost", "root", "", "blog") or die("Ошибка ".mysqli_error($link));
        if (!mysqli_set_charset($link, "utf8")) {
            echo "Ошибка при загрузке набора символов utf8";
            mysqli_error($link);
            exit();
        }
        $query ="select * from posts order by id_post desc";
        $result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link));
        if($result)
        {
            $rows = mysqli_num_rows($result);
            if ($rows < 5){
                for ($i = 0; $i < $rows; $i++) {
                    $row = mysqli_fetch_row($result);
                    $id = $row[0];
                    $query2 ="select * from comments where id_post='$id'";
                    $result2 = mysqli_query($link, $query2) or die("Ошибка " . mysqli_error($link));
                    $rows2 = mysqli_num_rows($result2);
                    echo "<div class='news-block'>"
                        ."<div class='image-news' style=\"background-image: url('img/".$row[6]."')\">"
                        ."<div class=\"image-border\">"
                        ."<div class=\"icon-network\"><i class=\"fa fa-facebook\" aria-hidden=\"true\"></i></div>"
                        ."<div class=\"icon-network\"><i class=\"fa fa-twitter\" aria-hidden=\"true\"></i></div>"
                        ."<a href='edit.php?id=$id' class=\"actions\"><i class=\"fa fa-pencil\" aria-hidden=\"true\"></i></a>"
                        ."<a href='post.php?id=$id&action=remove' class=\"actions\"><i class=\"fa fa-times\" aria-hidden=\"true\"></i></a>"
                        ."<div class=\"comments\">".$rows2." Comments</div>"
                        ."</div>"
                        ."</div>"
                        ."<div class=\"text-news\">"
                        ."<div class=\"triangle triangle-border\"></div>"
                        ."<div class=\"triangle\"></div>"
                        ."<div class=\"text\">"
                        ."<a href=\"post.php?id=$id\"><div class=\"header-news\">".$row[1]."</div></a>"
                        ."<div class=\"date-news\">".$row[3]."</div>"
                        ."<a href=\"post.php?id=$id\"><div class=\"link-news\">".$row[2]."</div></a>"
                        ."<div class=\"description\">".mb_strimwidth($row[5], 0, 320, "...")."</div>"
                        ."</div>"
                        ."<div class=\"text text-1\"></div>"
                        ."<div class=\"text text-2\"></div>"
                        ."</div>"
                        ."</div>";
                }
            } else {
                for ($i = 0; $i < $rows - 2; $i++) {
                    $row = mysqli_fetch_row($result);
                    $id = $row[0];
                    $query2 = "select * from comments where id_post='$id'";
                    $result2 = mysqli_query($link, $query2) or die("Ошибка " . mysqli_error($link));
                    $rows2 = mysqli_num_rows($result2);
                    echo "<div class='news-block'>"
                        . "<div class='image-news' style=\"background-image: url('img/" . $row[6] . "')\">"
                        . "<div class=\"image-border\">"
                        . "<div class=\"icon-network\"><i class=\"fa fa-facebook\" aria-hidden=\"true\"></i></div>"
                        . "<div class=\"icon-network\"><i class=\"fa fa-twitter\" aria-hidden=\"true\"></i></div>"
                        . "<a href='edit.php?id=$id' class=\"actions\"><i class=\"fa fa-pencil\" aria-hidden=\"true\"></i></a>"
                        . "<a href='post.php?id=$id&action=remove' class=\"actions\"><i class=\"fa fa-times\" aria-hidden=\"true\"></i></a>"
                        . "<div class=\"comments\">" . $rows2 . " Comments</div>"
                        . "</div>"
                        . "</div>"
                        . "<div class=\"text-news\">"
                        . "<div class=\"triangle triangle-border\"></div>"
                        . "<div class=\"triangle\"></div>"
                        . "<div class=\"text\">"
                        . "<a href=\"post.php?id=$id\"><div class=\"header-news\">" . $row[1] . "</div></a>"
                        . "<div class=\"date-news\">" . $row[3] . "</div>"
                        . "<a href=\"post.php?id=$id\"><div class=\"link-news\">" . $row[2] . "</div></a>"
                        . "<div class=\"description\">" . mb_strimwidth($row[5], 0, 320, "...") . "</div>"
                        . "</div>"
                        . "<div class=\"text text-1\"></div>"
                        . "<div class=\"text text-2\"></div>"
                        . "</div>"
                        . "</div>";
                }
                echo "<div class=\"news-block mini-block\">";
                for ($i = $rows - 2; $i < $rows; $i++) {
                    $row = mysqli_fetch_row($result);
                    $id = $row[0];
                    echo "<div class=\"mini-news\">"
                            . "<div class=\"image-news mini-image\" style=\"background-image: url('img/" . $row[6] . "')\">"
                                . "<div class=\"image-border mini-border\"></div>"
                            . "</div>"
                            . "<div class=\"text-news\">"
                                . "<div class=\"triangle triangle-border\"></div>"
                                . "<div class=\"triangle\"></div>"
                                . "<div class=\"text mini-text\">"
                                    . "<a href=\"post.php?id=$id\"><div class=\"header-news mini-header\">".$row[1]."</div></a>"
                                    . "<div class=\"date-news\">" . $row[3] . "</div>"
                                    . "<div class=\"description\">" . mb_strimwidth($row[5], 0, 170, "...") . "</div>"
                                . "</div>"
                                . "<div class=\"text text-1 mini-text-1\"></div>"
                                . "<div class=\"text text-2 mini-text-2\"></div>"
                            . "</div>"
                        . "</div>";
                }
                echo "</div>";
            }
        }
        mysqli_close($link);
        ?>
    </div>
    <?php
    include "sidebar/sidebar.php";
    ?>
</div>