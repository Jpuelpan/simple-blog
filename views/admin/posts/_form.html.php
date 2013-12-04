<form action="<?php echo (isset($post) && $post->id > 0) ? '/admin/posts/' . $post->id . '/edit' : '/admin/posts/new' ?>" method="POST">
  <?php if( flash('errors') ){ ?>
    <p class="alert alert-danger">
      <?php foreach (flash('errors') as $error) { ?>
        <?php echo $error; ?>
        <br>
      <?php } ?>
    </p>
  <?php } ?>
  <div class="form-group">
    <label for="">Titulo del post</label>
    <input type="text" name="post[title]" class="form-control" value="<?php echo isset($post) ? $post->title : '' ?>" autofocus="true">
  </div>
  <div class="form-group">
    <label for="">Contenido</label>
    <textarea name="post[body]" class="form-control" cols="30" rows="10"><?php echo isset($post) ? $post->body : '' ?></textarea>
  </div>
  <div class="form-group">
    <div class="row">
      <div class="col-sm-6">
        <label for="">Categoría</label>
        <select name="post[category_id]" id="" class="form-control">
          <?php foreach($categories as $category){ ?>
            <?php if( isset($post) && $post->category_id == $category->id ){ ?>
              <option value="<?php echo $category->id ?>" selected="selected"><?php echo $category->name ?></option>
            <?php }else{ ?>
              <option value="<?php echo $category->id ?>"><?php echo $category->name ?></option>
            <?php } ?>
          <?php } ?>
        </select>
      </div>
      <div class="col-sm-6">
        <label for="">Estado</label>
        <select name="post[status]" id="" class="form-control">
          <option value="Borrador" <?php echo (isset($post) && $post->status == 'Borrador') ? 'selected="selected"' : '' ?>>Borrador</option>
          <option value="Publicado" <?php echo (isset($post) && $post->status == 'Publicado') ? 'selected="selected"' : '' ?>>Publicado</option>
        </select>
      </div>
    </div>
  </div>
  <button type="submit" class="btn btn-primary">Guardar</button>
  <?php if( isset($post) ){ ?>
    <a href="/admin/posts/<?php echo $post->id ?>/destroy" class="btn btn-danger">Eliminar Post</a>
  <?php } ?>
</form>