<!DOCTYPE html>
<html lang="pl">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>blog</title>
</head>
<body>
  
  
  
  <h1 style="color:navy;"><center>BLOG<center><br /></h1>


 <form action="dodaj.php" method="post">
      <input type="submit" name="Dodaj nowy post" value="Dodaj nowy post" />
    </form><br />
<form action="id.php" method="post">
      <input type="submit" name="Kasowanie" value="Kasowanie" />
    </form>
	<br />
<form action="ide.php" method="post">
      <input type="submit" name="Edycja posta" value="Edycja posta" />
    </form>
	<br />	
	
	
  <?php while($row = mysqli_fetch_assoc($dbQuery)){ ?>
  
 <article>
 <h3 style="color:red;">Id posta: <?php echo $row['idPosts'];?> </h3>
 <h5><?php echo $row['postDate']?><br /><h5>
 <h2><center><?php echo $row['postTitle'] ?><center></h2>
 <h3><?php echo $row['postAuthor'] ?></h3>
 <?php echo $row['postIntro']?><br /><br /><br />
    
 
 <a href="index.php?post=<"></a>
 </article> 
  <?php } ?>
</body>
</html>