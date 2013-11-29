<h2>Mis posts</h2>

<?php if(count($posts) > 0){ ?>
  <?php foreach ($posts as $post) { ?>
    <article class="post-wrapper clearfix">
      <h3>
        <a href="/admin/posts/<?php echo $post->id ?>/edit"><?php echo $post->title ?></a>
      </h3>
      <p class="post-body"><?php echo $post->body ?></p>
    </article>
  <?php } ?>
<?php }else{ ?>
  <h4 style="text-align: center;">No tiene ningun post creado</h4>
  <p style="text-align: center;">
    <a href="/admin/posts/new">+ Crear un post</a>
  </p>
<?php } ?>