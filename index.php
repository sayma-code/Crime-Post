<?php include_once('inc/header.php') ?>

<div class="container">
    <h2>Latest Posts</h2>

    <?php foreach (get_posts() as $value) {?>
      <h3><?php echo $value['title']  ?></h3>
      <small class="post-date"><?php echo $value['created_at']  ?> in <strong><?php echo $value['name']  ?></strong></small>
      <div class="row ">
          <div class="col-md-3">
          <img  class="img-thumbnail img-fluid" src="img/posts/<?php echo $value['post_image']  ?> " alt="<?php echo $value['post_image']  ?>">
          </div>
          <div class="col-md-9">
              <p><?php echo $value['body']  ?></p>
              <p><a class="btn btn-secondary" href="#">Read More</a></p>
          </div>
      </div>
    <?php } ?>
    
    
    
</div>
<br>


<?php include_once('inc/footer.php') ?>