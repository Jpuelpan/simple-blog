<?php foreach($posts as $post){ ?>
  <article class="post-wrapper clearfix">
    <h3>
      <a href="/posts/<?php echo $post->id ?>"><?php echo $post->title ?></a>
    </h3>
    <p class="post-meta">
      <span class="post-date"><?php echo date('d-m-Y H:i:s', strtotime($post->created_at)); ?></span>
      <span class="post-author"><?php echo 'Creado por ' . $post->user->full_name(); ?></span>
      <span class="post-comments"><?php echo count($post->comments) . ' comentario'; ?></span>
    </p>
    <p class="post-body"><?php echo $post->body ?></p>
  </article>
<?php } ?>