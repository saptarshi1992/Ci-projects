<h3><?= $title ?></h3>
<hr>
<ul>
	<?php foreach ($categories as $cat_value) {?>
		<li> <a href="<?php echo site_url('categories/posts/');?><?php echo $cat_value['cat_id'];?>"><?php echo $cat_value['categories'];?></a>
			<?php if($this->session->userdata('user_id') == $cat_value['user_id']){?>
				<form action="catagories/delete/<?php echo $cat_value['cat_id'];?>" method="POST">
					<input type="submit" class="btn-link text-danger" value="[X]">
				</form>
			<?php }?>
		</li>
	<?php }?>
</ul>