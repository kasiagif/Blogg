<?php 

class blog
{
  private $dbConn;
  //Konstruktor
  function __construct($serverName,$userName,$password, $dbName)
  {
    // create connection
    $this -> dbConn = mysqli_connect($serverName,$userName,$password, $dbName);

    //check connection
    if (!$this -> dbConn)
    {
      die ("Connection failed:" . mysqli_connect_error());
    }
    echo "Connected successfully";
  }

  //pobranie postow

  function pobierzPosty($id){
  $sql = "SELECT idPosts, postDate, postAuthor, postTitle, postIntro FROM Posts WHERE idPosts=$id";
  mysqli_query($this ->dbConn , $sql);
  mysqli_close($this->dbConn);
// echo $row['idPosts'];
// echo $row['postDate'];
// echo $row['postTitle'];
// echo $row['postAuthor'];
// echo $row['postIntro'];
  }

  function dodaj($date, $author, $title, $intro){
  $sql = "INSERT INTO Posts ( postDate, postAuthor, postTitle, postIntro)
  VALUES ('$date', '$author', '$title', '$intro')";
  mysqli_query($this ->dbConn , $sql);
  mysqli_close($this->dbConn);
  }

  function usun($id){
    $sql = "DELETE FROM Posts WHERE idPosts=$id";
    mysqli_query($this ->dbConn , $sql);
    mysqli_close($this->dbConn);
  }

  function edytuj($idedyt, $introedyt){
    $sql = "UPDATE Posts SET PostIntro=$introedyt WHERE idPosts=$idedyt";
    mysqli_query($this ->dbConn , $sql);
    mysqli_close($this->dbConn);
  }


}


$blogTomka = new blog('localhost', 'root','root','Blogg');
$blogTomka -> pobierzPosty(1);

$action = $_GET['action'];
$id = $_GET['idPosts'];

switch ($action) {
  case 'usun':
    $blogTomka -> usun(2);
    break;
}

// $blogTomka = new blog('localhost', 'root','root','Blogg');
// // $blogTomka = new blog($serverName,$userName,$password, $dbName)
// $blogTomka -> dodaj('2001-12-10','autor','tytul','intro','readmore')
// // $blogTomka -> edytuj()
?>

<!DOCTYPE html>
<html lang="pl">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
</head>
<body>
  <a href="index.php?action=usun&id=2">usun</a>
</body>
</html>