<?php include_once('inc/header.php');

    if(!empty($_POST)){
        create_category($_POST['name']);

        $vr = 'Success';
    }

?>

<div class="container">
    <?php if(isset($vr)): ?>
    <div class="alert alert-primary" role="alert">
    <?=$vr?>
    </div>
<?php endif; ?>
    <h2>Create Category</h2>

<form action="" method="post" accept-charset="utf-8">
<div class="form-group">
    <label>Name</label>
    <input type="text" class="form-control" placeholder="Add Name" name="name">
  </div>

<button type="submit" class="btn btn-primary">Submit</button>

</form>
</div>

<?php include_once('inc/footer.php') ?>