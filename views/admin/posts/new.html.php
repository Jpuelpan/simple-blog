<form action="/admin/posts/new" method="POST">
  <h2>Crear nuevo Post</h2>
  <?php if( flash('error') ){ ?>
    <p class="alert alert-danger"><?php echo flash('error') ?></p>
  <?php } ?>
  <div class="form-group">
    <label for="">Titulo del post</label>
    <input type="text" name="post[title]" class="form-control">
  </div>
  <div class="form-group">
    <label for="">Contenido</label>
    <textarea name="post[body]" class="form-control" cols="30" rows="10"></textarea>
  </div>
  <div class="form-group">
    <div class="row">
      <div class="col-sm-6">
        <label for="">Categoría</label>
        <select name="post[category_id]" id="" class="form-control">
          <?php foreach($categories as $category){ ?>
            <option value="<?php echo $category->id ?>"><?php echo $category->name ?></option>
          <?php } ?>
        </select>
      </div>
      <div class="col-sm-6">
        <label for="">Estado</label>
        <select name="post[status]" id="" class="form-control">
          <option value="Borrador">Borrador</option>
          <option value="Publicado">Publicado</option>
        </select>
      </div>
    </div>
  </div>
  <button type="submit" class="btn btn-primary">Crear Post</button>
</form>