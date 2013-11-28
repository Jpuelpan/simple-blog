<h2>Mis posts</h2>

<?php if(count($posts) > 0){ ?>
  <?php foreach ($posts as $post) { ?>
    <panel class="panel-default">
      <div class="panel-body">
        <h4><?php echo $post->title ?></h4>
      </div>
    </panel>
  <?php } ?>
<?php }else{ ?>
  <h4 style="text-align: center;">No tiene ningun post creado</h4>
  <p style="text-align: center;">
    <a href="/admin/posts/new">+ Crear un post</a>
  </p>
<?php } ?>