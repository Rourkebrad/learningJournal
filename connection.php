<?php

//connection to journal.db using sqlite
try {
  $db = new PDO("sqlite:".__DIR__."/journal.db");
  $db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
  //var_dump($db);
} catch (Exception $e) {
  echo $e->getMessage();
  die();
}


?>
