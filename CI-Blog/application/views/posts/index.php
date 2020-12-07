<h2> <?= $title ?> </h2>
<hr>
<?php foreach ($posts as $key => $value) {?>
	<h3><?php echo $value['title'];?></h3><br>
	<div class="row">
		<div class="col-md-3">
			<img src="<?php echo site_url(); ?>assets/posts/<?php echo $value['post_image']; ?>" height="200px" width="200px">
		</div>
		<div class="col-md-9">
				<small class='post-date'><?php echo $value['created_at'];?>in <strong><?php echo $value['categories'];?></strong></small> <br>
		       <?php echo word_limiter($value['body'],60);?><br><br>
		       <p><a class="btn btn-warning" href="<?php echo site_url('/posts/'.$value['slug']);?>">Read More</a></p>
		</div>
		
	</div>
	
<?php }?>
<div class="pagination-links">
<?php echo $this->pagination->create_links(); ?>
</div>
