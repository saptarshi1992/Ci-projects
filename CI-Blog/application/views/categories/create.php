<h3> <?= $title ?> </h3>
<hr>
<?php echo validation_errors(); ?>
<?php echo form_open_multipart('categories/create');?>

<div class="form-group">
    <label name = "title">Name</label>
    <input type="text" class="form-control" placeholder="Enter Category Name" name="name">
   
  </div>
 <div class="form-group">
 	<button type="submit" class="btn btn-primary" name = "submit" value="submit">Submit</button>
 </div>

  <?php echo form_close();?>
