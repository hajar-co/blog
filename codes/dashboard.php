
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My blog</title>
</head>
<body>
<?php 
    require "Articles.php";?>

<button type="submit"><a href="insert.php">Insert an article + </a></button>

<?php 
$getAritcles = new article();
$Articles= $getAritcles->getArticle()?>

</form>

<table>
<thead>
    <tr>
      <th>ID</th>
      <th scope="col">Title</th>
      <th scope="col">Image</th>
      <th scope="col">Date</th>
      <th scope="col">
      Actions</th> 
    </tr>
  </thead>
  <?php foreach ($Articles as $Article) { ?>
  <tbody>
  <tr>
  <td> <?=$Article['ID']; ?></td>
  <td><?=$Article['title']; ?></td>
  <td><img width="40" src="<?=$Article['image'];?>"></td>
  <td><?=$Article['datePub']; ?></td>
  <td>
  
  <!-- <form action="dashboard.php" method="POST">    always in button don't use form!!!!!!! -->
      <button type="submit" name="read" value="">Read</button>
      <a href="update.php?id=<?=$Article['ID']?>"><button type="submit" name="update" value="">Update</button></a>
      <a href="delete.php?id=<?=$Article['ID']?>"><button type="submit" name="delete" value="">Delate</button></a>
  <!-- </form> -->
      </td>
  </tr>
  </tbody>
  <?php } ?>
</table>


</body>
</html>
