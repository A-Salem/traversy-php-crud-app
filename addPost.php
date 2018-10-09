<?php
  require('config/config.php');
  require('config/db.php');

  if(isset($_POST['submit'])){
    $title = mysqli_real_escape_string($conn, $_POST['title']);
    $body = mysqli_real_escape_string($conn, $_POST['body']);
    $author = mysqli_real_escape_string($conn, $_POST['author']);

    $query = "INSERT INTO posts(title, author, body) VALUES('$title', '$author', '$body')";

    if(mysqli_query($conn, $query)){
      header('Location: ' .ROOT_URL. '');
    } else {
      echo 'Error: ' .mysqli_error($conn);
    }
  }
?>

<?php include('inc/header.php'); ?>
  <div class="container">
    <h1>Add Post</h1>
    <form class="" action="<?php $_SERVER['PHP_SELF'] ?>" method="POST">
      <div class="form-group">
        <label for="title">Title</label>
        <input type="text" id="title" name="title" value="" class="form-control">
      </div>
      <div class="form-group">
        <label for="author">Author</label>
        <input type="text" id="author" name="author" value="" class="form-control">
      </div>
      <div class="form-group">
        <label for="body">Body</label>
        <textarea id="body" name="body" value="" class="form-control"></textarea>
      </div>
      <input type="submit" name="submit" value="Submit" class="btn btn-primary">
    </form>
  </div>
<?php include('inc/footer.php'); ?>
