<?php
include('inc/header.php');
include('functions.php');

//if statement for the delete_entry function
if(isset($_POST['delete']))
{
  if (delete_entry(filter_input(INPUT_POST,'delete', FILTER_SANITIZE_NUMBER_INT)))
  {
  echo "Journal deleted";
  header('Location: index.php');
  exit;
}
}

?>
