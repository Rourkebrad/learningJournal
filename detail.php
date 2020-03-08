<?php
include('inc/header.php');
include('functions.php');
$id = trim(filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT));
$entry = get_entry($id);

?>

    <section>
        <div class="container">
            <div class="entry-list single">

                    <article>
                        <h1><?php echo $entry['title'];    ?></h1>
                        <time datetime=" <?php $entry['date']; ?>"> <?php echo date('F d, Y', strtotime($entry['date']))?> </time>
                        <div class="entry">
                            <h3>Time Spent: </h3>
                            <p><?php echo $entry['time_spent'] . " mins";     ?></p>
                        </div>
                        <div class="entry">
                            <h3>What I Learned:</h3>
                            <p><?php echo $entry['learned'];?></p>
                        </div>
                        <div class="entry">
                            <h3>Resources to Remember:</h3>
                            <?php
                            echo "<ul>";
                            foreach( explode(' ', $entry['resources']) as $resource)
                            {

                            echo "<li><a href='" . strtolower(trim($resource)) . "'>" . strtolower(trim($resource)) . "</a></li>";
                            }
                            echo "</ul>";
                            ?>
                        </div>
                    </article>
                </div>
            </div>
            <div class="edit">
                <p><a href="edit.php?id=<?php echo $id;?>">Edit Entry</a></p>
                <?php
                echo "<form method='post' action='delete.php'>";
                echo '<div class="button2">';
                echo "<input type='hidden' value='".$entry['id'] . "' name='delete'/>";
                echo "<input type='submit' value='Delete' class='button1'/>";
                echo "</div>";
                echo "</form";
                echo "<br>";
                ?>
        </section>
      <?php
      include('inc/footer.php');
      ?>
    </body>
</html>
