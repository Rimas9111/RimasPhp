<?php
$allPosts = $this->posts;?>



<div class="container">
    <ul class="list-group">
        <?php while ($posts = $allPosts->fetch_assoc()) { ?>
            <li class="list-group-item">
                <button type="button" class="btn btn-danger" href="http://localhost/rimasphp/mvc/index.php">Posts</button>
                <h3><?php echo $posts['title']?></h3>
                <p class="card-text mb-auto"><?php echo substr($posts['content'], -250)?></p>
            </li>
        <?php } ?>
    </ul>
</div>