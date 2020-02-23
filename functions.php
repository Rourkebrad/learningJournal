<?php

$catalog = entriesForIndex();


function entriesForIndex()
{
  include('inc/connection.php');
  try{
  $sql = "SELECT title, date, id FROM 'entries' ORDER BY date ASC";
  $results = $db->query($sql);
  //return $results->fetchAll();
  }
  catch(Exception $e)
  {
    echo "Unable to retrieve";
    die();
  }
  $catalog = $results->fetchAll();
  return $catalog;
}

function add_entry($title, $date, $time_spent, $learned, $resources, $id = NULL)
{
  include('inc/connection.php');
  if($id)
  {$sql = 'UPDATE entries SET title = ?, date = ?, time_spent = ? , learned = ?, resources = ? ' . ' WHERE id = ?'; }
  else{
  $sql = "INSERT INTO entries(title, date, time_spent, learned, resources) VALUES(?, ?, ?, ?, ?)";
}
  try
  {
    $results = $db->prepare($sql);
    $results->bindValue(1, $title, PDO::PARAM_STR);
    $results->bindValue(2, $date, PDO::PARAM_STR);
    $results->bindValue(3, $time_spent, PDO::PARAM_INT);
    $results->bindValue(4, $learned, PDO::PARAM_STR);
    $results->bindValue(5, $resources, PDO::PARAM_STR);
    if($id)
    {
      $results->bindValue(6, $id, PDO::PARAM_INT);
    }
    $results->execute();
  }
  catch(Exception $e)
  {
    echo "Error " . $e->getMessage() . "<br>";
    return false;
  }
  return true;
}

function get_entry($id)
{
  include('inc/connection.php');
  $sql = 'SELECT * FROM entries WHERE id = ?';
  try
  {
    $results = $db->prepare($sql);
    $results->bindValue(1,$id, PDO:: PARAM_INT);
    $results->execute();
  }
  catch(Exception $e)
  {
    echo "Error " . $e->getMessage() . "<br>";
    return false;
  }
  return $results->fetch();
}

function delete_entry($id)
{
  include('inc/connection.php');
  $sql = 'DELETE FROM entries WHERE id = ?';
  try
  {
    $results = $db->prepare($sql);
    $results->bindValue(1,$id, PDO:: PARAM_INT);
    $results->execute();
  }
  catch(Exception $e)
  {
    echo "Error " . $e->getMessage() . "<br>";
    return false;
  }
  return true;
}



?>
