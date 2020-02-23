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
                          echo "<article><h2><a href='detail.php?id=" . $item['id'] . "'>" .  $item['title'] . " " .  $item['id'] .  "<br></a></h2> ";
                          echo "<time datetime=" . $item['date'] .">" .  date("F d, Y", strtotime($item['date'])) . "</time> </article>";
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
