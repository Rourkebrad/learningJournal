<!DOCTYPE html>
<html>
    <?php
    include('inc/header.php');
    include('functions.php');
    $title = $date = $time_spent = $learned = $resources = '';



    if($_SERVER['REQUEST_METHOD'] == 'POST')
    {
      $title = trim(filter_input(INPUT_POST,'title', FILTER_SANITIZE_STRING));
      $date = trim(filter_input(INPUT_POST,'date', FILTER_SANITIZE_STRING));
      $time_spent = trim(filter_input(INPUT_POST,'time_spent', FILTER_SANITIZE_NUMBER_INT));
      $learned = trim(filter_input(INPUT_POST,'learned', FILTER_SANITIZE_STRING));
      $resources = trim(filter_input(INPUT_POST,'resources', FILTER_SANITIZE_STRING));
      //$id = $id ++;


      $dateMatch = explode('/', $date);


    if(empty($title) || empty($date) || empty($time_spent) || empty($learned) || empty($resources))
    {
      $error_msg = "Please fill in all fields required.";
    }
  /*  else if(count($dateMatch) !=3 || strlen($dateMatch[0]) !=2 || strlen($dateMatch[1]) !=2 || strlen($dateMatch) != 4 || !checkdate($dateMatch[1], $dateMatch[0], $dateMatch[2]))
    {
      $error_msg =  "Invalid date!";
    }*/
    else
    {
      if (add_entry($title, $date, $time_spent, $learned, $resources, $id))
      {
        header('Location: index.php');
        exit;
      }
      else
        {
            $error_msg = "Could not add project";
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
                <div class="new-entry">
                    <h2>New Entry</h2>
                    <form method="post" action="new.php">
                        <label for="title"> Title</label>
                        <input id="title" type="text" name="title" value="<?php echo htmlspecialchars($title); ?>"><br>
                        <label for="date">Date</label>
                        <input id="date" type="date" name="date" value="<?php echo htmlspecialchars($date); ?>"><br>
                        <label for="time_spent"> Time Spent (mins)</label>
                        <input id="time_spent" type="text" name="time_spent" value="<?php echo htmlspecialchars($time_spent); ?>"><br>
                        <label for="learned">What I Learned</label>
                        <textarea id="learned" rows="5" name="learned" value="<?php echo htmlspecialchars($learned); ?>"></textarea>
                        <label for="resources">Resources to Remember</label>
                        <textarea id="resources" rows="5" name="resources" value="<?php echo htmlspecialchars($resources); ?>"></textarea>

                        <input type="submit" value="Publish Entry" class="button">
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
