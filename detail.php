<!DOCTYPE html>
<html>
<?php
include('inc/header.php');
include('functions.php');
$id = trim(filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT));
$entry = get_entry($id);

if(isset($_POST['delete']))
{
  delete_entry($id);
  header('Location: index.php');
  exit;
}

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
                            <p><?php  echo $entry['learned'];     ?></p>
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
                <p><a href="edit.php?=<?php echo $id;?>">Edit Entry</a></p>
                <?php
                echo "<p>";
                echo "<form method='post' action='detail.php'>";
                echo "<input type='hidden' value='".$entry['id'] . "' name='delete'/>";
                echo "<input type='submit' value='Delete'/>";
                echo "</form";
                echo "</p>";
                ?>

        </section>
      <?php
      include('inc/footer.php');
      ?>
    </body>
</html>
