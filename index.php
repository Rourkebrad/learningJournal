<?php
include('inc/header.php');
include('functions.php');
?>

        <section>
            <div class="container">
                <div class="entry-list">

                        <?php foreach($catalog as $item)
                        {
                          echo "<br>";
                          echo "<article><h1><a href='detail.php?id=" . $item['id'] . "'>" . "Title: " .   $item['title'] . " "  .  "<br></a></h1> ";
                          echo "<h2><time datetime=" . $item['date'] .">" .  date("F d, Y", strtotime($item['date'])) . "</time></h2> </article>";
                          echo "<br>";
                          echo "<hr>";

                        } ?>

                </div>
            </div>


        </section>
        <?php
        include('inc/footer.php');
        ?>
    </body>
</html>
