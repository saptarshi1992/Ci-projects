<h2> <?= $title ?> </h2>
<?php echo validation_errors();?> 
<?php echo form_open('posts/update_data');?>
<form>

  <div class="form-group">
  	<input type="hidden" name="id" value="<?php echo $post['id'];?>">
    <label name = "title">Title</label>
    <input type="text" class="form-control" placeholder="Title" name="title" value="<?php echo $post['title'];?>">
   
  </div>
  <div class="form-group">
    <label >Body</label>
    <textarea class="form-control" name="body" placeholder="Enter Post" id="editor"> <?php echo $post['body'];?> </textarea>
  </div>
  
  <div class="form-group">
  	<label>Categories</label>
  	<select class="form-control" name="cat_id">
  		<?php foreach ($categories as $cat_value) {?>
  		<option name="categories" value="<?php echo $cat_value['cat_id'];?>"><?php echo $cat_value['categories'];?></option>
  		<?php }?>
  	</select>
  </div>
  <button type="submit" class="btn btn-primary" name = "submit">Submit</button>
</form>