<?php
require './stop.php';
require "../components/header.php";
require "Articles.php";
?>
<body>
<div class="dashboard">
<a class="linkA" href="insert.php" id="insertBtn"><button type="submit" class="btn btn-primary" >Insert an article +</button></a>
<a class="linkA exitBtn" href="logout.php"><button type="submit" class="btn btn-primary">Log out</button></a>
<?php 
$getAritcles = new article();
$Articles= $getAritcles->getArticle()?>
<table class="table table-bordered border-dark">
<thead>
    <tr>
      <th>ID</th>
      <th>Title</th>
      <th>Image</th>
      <th>Date</th>
      <th>Actions</th> 
    </tr>
  </thead>
  <?php foreach ($Articles as $Article) { ?>
  <tbody>
  <tr>
  <td> <?=$Article['ID']; ?></td>
  <td><?=$Article['title']; ?></td>
  <td><img width="80" src="<?=$Article['image'];?>"></td>
  <td><?=$Article['datePub']; ?></td>
  <td>
  
  <!-- <form action="dashboard.php" method="POST">    always in button don't use form!!!!!!! -->
      <a class="linkA" href="read.php?id=<?=$Article['ID']?>"><button type="submit" name="read" value="" class="btn btn-info">Read</button></a>
      <a class="linkA" href="update.php?id=<?=$Article['ID']?>"><button type="submit" name="update" value="" class="btn btn-warning">Edit</button></a>
      <a class="linkA" href="delete.php?id=<?=$Article['ID']?>"><button type="submit" name="delete" value="" class="btn btn-danger">Delete</button></a>
  <!-- </form> -->
      </td>
  </tr>
  </tbody>
  <?php } ?>
</table>

</div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"></script>
</html>
