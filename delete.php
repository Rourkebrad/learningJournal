<?php
include('inc/header.php');
include('functions.php');


if(isset($_POST['delete']))
{
  if (delete_entry(filter_input(INPUT_POST,'delete', FILTER_SANITIZE_NUMBER_INT)))
  {
  header('Location: index.php');
  exit;
}
}

?>
