<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Mi super blog</title>
  <link rel="stylesheet" href="/assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="/assets/css/styles.css">
  <script type="text/javascript" src="/assets/js/jquery.js"></script>
  <script type="text/javascript" src="/assets/js/bootstrap.min.js"></script>
</head>
<body>

  <header>
    <div class="container">
      <h3 id="logo" class="pull-left">
        <a href="/admin">Administración</a>
      </h3>

      <?php if( user_signed_in() ){ ?>
        <ul class="nav nav-pills pull-right">
          <li>
            <a href="/admin/posts/new">Crear Post</a>
          </li>
          <li>
            <a href="/admin/logout">Cerrar sesión</a>
          </li>
        </ul>
      <?php } ?>
    </div>
  </header>

  <div class="container">
    <section id="main" class="col-sm-12">
      
      <div id="messages-area">
        <?php if( flash('success') ){ ?>
          <p class="alert alert-success"><?php echo flash('success') ?></p>
        <?php } ?>

        <?php if( flash('error') ){ ?>
          <p class="alert alert-danger"><?php echo flash('error') ?></p>
        <?php } ?>
      </div>

      <div class="clearfix"></div>
      <?php echo content(); ?>
    </section>
  </div>

  <footer>
    <p>Juan Puelpan - <?php echo date('Y') ?></p>
  </footer>
</body>
</html>