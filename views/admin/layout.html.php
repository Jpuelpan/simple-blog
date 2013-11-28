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

      <ul class="nav nav-pills pull-right">
        <li class="active">
          <a href="/admin/logout">Cerrar sesión</a>
        </li>
      </ul>
    </div>
  </header>

  <div class="container">
    <section id="main" class="col-sm-12">
      <?php echo content(); ?>
    </section>
  </div>

  <footer>
    <p>Juan Puelpan - <?php echo date('Y') ?></p>
  </footer>
</body>
</html>