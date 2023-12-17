<?php include_once('inc/header.php');

if(!empty($_POST)){
  $image = file_upload($_FILES);
  create_post($_POST['category_id'], $_POST['title'], $_POST['body'], $image);
  header("Location: index.php"); 
  exit();
}

?>

<div class="container">

<h2>Create Post</h2>

<form action="" enctype="multipart/form-data" method="post" accept-charset="utf-8">
  <div class="form-group">
    <label>Title</label>
    <input type="text" class="form-control" placeholder="Add Title" name="title">
  </div>
  <div class="form-group">
  <label>Body</label>
  <textarea id="editor" class="form-control" name="body" id="" cols="30" rows="10"></textarea>
  </div>
  <div class="form-group">
    <label>Category</label>
    <select name="category_id" class="form-control">
      <?php foreach (get_categories() as $value): ?>
      <option value="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></option>
      <?php endforeach;?>
    
    </select>
  </div>
  <div class="form-group">
    <label>Uplodad Image</label>
    <input type="file" class="form-control-file" name="pictures" size="20">
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
  </form>
</div>

<?php include_once('inc/footer.php') ?>