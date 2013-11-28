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
        <a href="/">Mi Super Blogz</a>
      </h3>

<!--       <ul class="nav nav-pills pull-right">
        <li class="active">
          <a href="">Inicio</a>
        </li>
        <li>
          <a href="">Noticias</a>
        </li>
        <li>
          <a href="">Una categoría</a>
        </li>
        <li>
          <a href="">Contacto</a>
        </li>
      </ul> -->
    </div>
  </header>

  <div class="container">
    <section id="main" class="col-sm-8">
      <?php echo content(); ?>
    </section>

    <aside class="col-sm-4">

      <div class="panel panel-primary">
        <div class="panel-heading">Úlitmos Posts</div>
        <div class="panel-body">
          <ul class="nav nav-pills nav-stacked">
            <?php foreach($posts as $post){ ?>
              <li><a href="/posts/<?php echo $post->id ?>"><?php echo $post->title ?></a></li>
            <?php } ?>
          </ul>
        </div>
      </div>
    </aside>

    <div class="clearfix"></div>
  </div>

  <footer>
    <p>Juan Puelpan - <?php echo date('Y') ?></p>
  </footer>
</body>
</html>