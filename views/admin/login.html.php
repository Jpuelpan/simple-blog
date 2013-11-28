<form action="/admin/login" method="POST">
  <h2>Iniciar sesión</h2>
  <?php if( flash('error') ){ ?>
    <p class="alert alert-danger"><?php echo flash('error') ?></p>
  <?php } ?>
  <div class="form-group">
    <label for="exampleInputEmail1">Correo electrónico</label>
    <input type="email" name="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Contraseña</label>
    <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
  </div>
  <button type="submit" class="btn btn-default">Iniciar sesión</button>
</form>