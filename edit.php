<?php
include('inc/header.php');
require('functions.php');

$title = $date = $time_spent = $learned = $resources = $id =  "";

  $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
  $entry = get_entry($id);

if($_SERVER['REQUEST_METHOD'] == 'POST')
{

  $title = trim(filter_input(INPUT_POST,'title', FILTER_SANITIZE_STRING));
  $date = trim(filter_input(INPUT_POST,'date', FILTER_SANITIZE_STRING));
  $time_spent = trim(filter_input(INPUT_POST,'time_spent', FILTER_SANITIZE_NUMBER_INT));
  $learned = trim(filter_input(INPUT_POST,'learned', FILTER_SANITIZE_STRING));
  $resources = trim(filter_input(INPUT_POST,'resources', FILTER_SANITIZE_STRING));
  $id = trim(filter_input(INPUT_POST,'id', FILTER_SANITIZE_STRING));


  if(empty($title) || empty($date) || empty($time_spent) || empty($learned) || empty($resources))
  {
    $error_msg = "Please fill in all fields required.";
  }

  else
  {
    if(edit_entry($title, $date, $time_spent, $learned, $resources, $id))
    {
      echo "Journal Edited!";
      header('Location: index.php');
      exit;
    }
    else
      {
          $error_msg = "Journal was not edited!";
      }

  }
  }

?>

        <section>
          <?php
          if(isset($error_msg))
          {
            echo "$error_msg";
          }
          ?>
            <div class="container">
                <div class="edit-entry">
                    <h2>Edit Entry</h2>
                    <form method="post">
                        <label for="title" class="button">Title</label>
                        <input id="title" type="text" name="title" value="<?php echo $entry['title']; ?>"><br>
                        <label for="date" class="button">Date</label>
                        <input id="date" type="date" name="date" value="<?php echo $entry['date'];?>"><br>
                        <label for="time-spent" class="button"> Time Spent (mins)</label>
                        <input id="time-spent" type="text" name="time_spent" value="<?php echo $entry['time_spent'];?>"><br>
                        <label for="learned" class="button">What I Learned</label>
                        <textarea id="learned" rows="5" name="learned"><?php echo $entry['learned'];?></textarea>
                        <label for="resources" class="button">Resources to Remember (seperate links by spaces)</label>
                        <textarea id="resources" rows="5" name="resources"><?php echo $entry['resources'];?> </textarea>
                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                        <input type="submit" value="Confirm" class="button">
                        <a href="index.php" class="button button-secondary">Cancel</a>
                    </form>
                </div>
            </div>
        </section>
      <?php
      include('inc/footer.php');
      ?>
    </body>
</html>
