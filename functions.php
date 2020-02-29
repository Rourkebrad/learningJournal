<?php

$catalog = entriesForIndex();


function entriesForIndex()
{
  include('inc/connection.php');
  try{
  $sql = "SELECT title, date, id, tag FROM 'entries'
  JOIN entries_tags ON entries.id = entries_tags.id JOIN tags ON entries_tags.tag_id = tags.tag_id ORDER BY date ASC";
  $results = $db->query($sql);

  }
  catch(Exception $e)
  {
    echo "Unable to retrieve";
    die();
  }
  $catalog = $results->fetchAll();
  return $catalog;
}

function add_entry($title, $date, $time_spent, $learned, $resources, $tag)
{
  include('inc/connection.php');
  $sql = "INSERT INTO entries(title, date, time_spent, learned, resources) VALUES(?, ?, ?, ?, ?)";
  $sql2 = "INSERT INTO tags(tag) VALUES (?)";
  try
  {
    $results = $db->prepare($sql);
    $results2 = $db->prepare($sql2);
    $results->bindValue(1, $title, PDO::PARAM_STR);
    $results->bindValue(2, $date, PDO::PARAM_STR);
    $results->bindValue(3, $time_spent, PDO::PARAM_INT);
    $results->bindValue(4, $learned, PDO::PARAM_STR);
    $results->bindValue(5, $resources, PDO::PARAM_STR);
    $results2->bindValue(1, $tag, PDO::PARAM_STR);
    $results->execute();
    $results2->execute();
  }
  catch(Exception $e)
  {
    echo "Error " . $e->getMessage() . "<br>";
    return false;
  }
  return true;
}

function edit_entry($title, $date, $time_spent, $learned, $resources, $id)
{
  include('inc/connection.php');

  $sql = 'UPDATE entries SET title = ?, date = ?, time_spent = ? , learned = ?, resources = ? WHERE id = ?';

  try
  {
    $results = $db->prepare($sql);
    $results->bindValue(1, $title, PDO::PARAM_STR);
    $results->bindValue(2, $date, PDO::PARAM_STR);
    $results->bindValue(3, $time_spent, PDO::PARAM_INT);
    $results->bindValue(4, $learned, PDO::PARAM_STR);
    $results->bindValue(5, $resources, PDO::PARAM_STR);
    $results->bindValue(6, $id, PDO::PARAM_INT);
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
  $sql = 'SELECT title, date, time_spent, learned, resources, id FROM entries WHERE id = ?';
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
