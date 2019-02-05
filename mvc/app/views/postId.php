<div class="container">
	<div class="row"><?php
		foreach ($this->posts as $post) { ?>
			<div class="blog-post">
	        <h2 class="blog-post-title"><?php echo $post['title']; ?></h2>
	        <p class="blog-post-meta">Author: <?php echo($post['author']['name']); ?></p>
	        <hr>
	        <p>Content: <?php echo $post['content']; ?></p>
	        <hr>

      		</div>
      	<?php }?>
	</div>
</div>