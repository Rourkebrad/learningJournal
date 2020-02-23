<?php
include('inc/header.php');
require('functions.php');

$title = $date = $time_spent = $learned = $resources = "";

  $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
  $entry = get_entry($id);

//var_dump($entry['title']);
//var_dump($title);

if($_SERVER['REQUEST_METHOD'] == 'POST')
{
  //$id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);
  $title = trim(filter_input(INPUT_POST,'title', FILTER_SANITIZE_STRING));
  $date = trim(filter_input(INPUT_POST,'date', FILTER_SANITIZE_STRING));
  $time_spent = trim(filter_input(INPUT_POST,'time_spent', FILTER_SANITIZE_NUMBER_INT));
  $learned = trim(filter_input(INPUT_POST,'learned', FILTER_SANITIZE_STRING));
  $resources = trim(filter_input(INPUT_POST,'resources', FILTER_SANITIZE_STRING));

  if(add_entry($title, $date, $time_spent, $learned, $resources, $id))
  {
    echo "Journal Edited!";
    header('Location: index.php');
    exit;
  } else {
    echo "Error: Journal was not edited";
  }

}

?>

<!DOCTYPE html>

        <section>
            <div class="container">
                <div class="edit-entry">
                    <h2>Edit Entry</h2>
                    <form method="post">
                        <label for="title">Title</label>
                        <input id="title" type="text" name="title" value="<?php echo $entry['title']; ?>"><br>
                        <label for="date">Date</label>
                        <input id="date" type="date" name="date"><br>
                        <label for="time-spent"> Time Spent</label>
                        <input id="time-spent" type="text" name="timeSpent"><br>
                        <label for="what-i-learned">What I Learned</label>
                        <textarea id="what-i-learned" rows="5" name="whatILearned"></textarea>
                        <label for="resources-to-remember">Resources to Remember</label>
                        <textarea id="resources-to-remember" rows="5" name="ResourcesToRemember"></textarea>
                        <input type="submit" value="Publish Entry" class="button">
                        <a href="#" class="button button-secondary">Cancel</a>
                    </form>
                </div>
            </div>
        </section>
      <?php
      include('inc/footer.php');
      ?>
    </body>
</html>
