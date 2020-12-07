<h2> <?= $title ?> </h2>
<?php echo validation_errors();?> 
<?php echo form_open_multipart('posts/create');?>
<form>
  <div class="form-group">
    <label name = "title">Title</label>
    <input type="text" class="form-control" placeholder="Title" name="title">
   
  </div>
  <div class="form-group">
    <label >Body</label>
    <textarea class="form-control" name="body" placeholder="Enter Post" id="editor"></textarea>
  </div>

  <div class="form-group">
  	<label>Categories</label>
  	<select class="form-control" name="cat_id">
  		<?php foreach ($categories as $cat_value) {?>
  		<option name="categories" value="<?php echo $cat_value['cat_id'];?>"><?php echo $cat_value['categories'];?></option>
  		<?php }?>
  	</select>
  </div>
  
  <div class="form-group">
   <label>Image-Upload</label>
  	<input type="file" name="userfile" size="20" />
  </div>
  <button type="submit" class="btn btn-primary" name = "submit" value="upload">Submit</button>
</form>