
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
$get= $getAritcles->getArticle()?>

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
  <?php foreach ($get as $ge) { ?>
  <tbody>
  <tr>
  <td> <?=$ge['ID']; ?></td>
  <td><?=$ge['title']; ?></td>
  <td><?=$ge['image']; ?></td>
  <td><?=$ge['datePub']; ?></td>
  <td>
  
  <form action="dashboard.php" method="POST">
      <button type="submit" name="read" value="">Read</button>
      <button type="submit" name="update" value="">Update</button>
      <button type="submit" name="delete" value="">Delate</button>
      </form>
      </td>
  </tr>
  </tbody>
  <?php } ?>
</table>


</body>
</html>
