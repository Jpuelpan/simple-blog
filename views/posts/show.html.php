<div class="post-heading">
  <h2><?php echo $post->title ?></h2>
  <div class="pull-right post-meta">
    <?php echo "Creado por" . $post->user->full_name() ?>
    <?php echo " - " .$post->human_date() ?>
  </div>
</div>

<div class="clearfix"></div>

<div class="post-content">
  <?php echo $post->body ?>
</div>
