<?php
require_once('config.php');
require_once('helpers.php');

on('GET', '/', function (){
  $posts = Post::published()->orderBy('created_at')->get();

  render('index', array('posts' => $posts));
});

on('GET', '/posts/:id', function (){
  $posts = Post::published()->orderBy('created_at')->get();
  $post  = Post::published()->where('id', params('id'))->first();

  render('posts/show', array(
    'post' => $post,
    'posts' => $posts
  ));
});

# Admin routes
prefix('admin', function(){
  # Check authentication
  before(function($method, $path){
    $route = split('/', $path);
    if( $route[0] == 'admin' ){
      if( !user_signed_in() && $route[1] != 'login' ){
        flash('error', 'Debe iniciar sesión para ingresar a esta sección');
        redirect('/admin/login');
      }
    }
  });

  # Show a list with all user posts
  on('GET', '/', function (){
    if( !user_signed_in() ){
      redirect('/admin/login');
    }else{
      $posts = current_user()->posts;
      render('admin/index', ['posts' => $posts], 'admin/layout');
    }
  });

  # Show the login form
  on('GET', '/login', function (){
    render('admin/login', [], 'admin/layout');
  });

  # Authenticate the user
  on('POST', '/login', function (){
    if( user_signed_in() ){
      redirect('/admin');
      return false;
    }
    
    $user = User::whereRaw('password = ? AND email = ?', array(params('password'), params('email')))->first();

    if( $user ){
      session('authenticated', true);
      session('user_id', $user->id);
      redirect('/admin');
    }else{
      flash('error', 'Correo electrónico o contraseña incorrectos.');
      render('admin/login', [], 'admin/layout');
    }
  });

  # Logout user
  on('GET', '/logout', function (){
    if( user_signed_in() ){
      session('authenticated', null);
      session('user_id', null);
      redirect('/admin');
    }
  });




  # Posts CRUD
  prefix('/posts', function(){
    # Nuevo Post
    on('GET', '/new', function(){
      $categories = Category::all();
      render('admin/posts/new', ['categories' => $categories], 'admin/layout');
    });

    # Crear Post
    on('POST', '/new', function(){
      $post = new Post(params('post'));
      $post->user_id = current_user()->id;
      $post->save();
    });

    # Editar Post
    on('GET', '/edit/:id', function(){
      $post = Post::find(params('id'));
      render('admin/posts/edit', ['post' => $post], 'admin/layout');
    });

    # Actualizar Post
    on('POST', '/edit/:id', function(){
      $post = Post::find(params('id'));
      render('admin/posts/edit', ['post' => $post], 'admin/layout');
    });

    # Eliminar Post
    on('GET', '/destroy/:id', function(){
      $post = Post::find(params('id'));
      if($post->delete()){
        flash('success', 'El post se ha eliminado correctamente');
        redirect('/admin');
      }
    });
  });
});


dispatch();
?>