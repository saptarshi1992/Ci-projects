 <h3><?php echo $post['title']; ?></h3>
 <small class='post-date'><?php echo $post['created_at'];?></small><br>
 <img src="<?php echo site_url(); ?>assets/posts/<?php echo $post['post_image']; ?>" height="200px" width="200px">
 <div class = "post-body">
 	<p> <?php echo $post['body'] ?> </p></div>
 	<?php if($this->session->userdata('user_id') == $post['user_id']){?>
 		<a class="btn btn-warning pull-left" href="<?php echo base_url(); ?>posts/edit/<?php echo $post['slug']; ?>">Edit</a><hr>
 	<?php }?>
    <!--<?php echo form_open('/posts/delete/'.$post['id']); ?>
		<input type="submit" value="Delete" class="btn btn-danger">
	</form><hr>!--> 
	<h3>Comments</h3>
	<?php if($comment)
	{?>
		<?php foreach ($comment as $comment_data) {?>
			<div class="post-date">
				<h5><?php echo $comment_data['comment'];?>  [BY <strong> <?php echo $comment_data['name'];?></strong>]</h5>
			</div>
			
		<?php  }
	}
	else{?>
		<h5>No comment to Display</h5>
	<?php } ?>

	
	<hr><h3>Add Comment:</h3>
	<?php echo validation_errors();?> 
	<?php echo form_open('comments/create/'.$post['id']);?>
	<form>
		<div class="form-group">
			<label name = "title">Name</label>
			<input type="text" class="form-control" placeholder="Name" name="name">

		</div>
		<div class="form-group">
			<label name = "title">Email</label>
			<input type="text" class="form-control" placeholder="Enter Email" name="email">

		</div>
		<div class="form-group">
			<label >Comment</label>
			<textarea class="form-control" name="comment" placeholder="Enter comment"></textarea>
		</div>

		<input type="hidden" name="slug" value="<?php echo $post['slug'];?>">
		<div class="form-group">

			<button type="submit" class="btn btn-primary" name = "submit">Submit</button>
		</div>
		
	</form>
	<?php echo form_close();?>


