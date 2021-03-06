<?php
require_once('config.php');
require_once('helpers.php');

use Fuel\Validation\Validator as Validator;

on('GET', '/', function (){
  $posts = Post::published()->latest()->get();

  render('index', array('posts' => $posts));
});

on('GET', '/posts/:id', function (){
  $posts = Post::published()->latest()->get();
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
      $posts = current_user()->posts()->latest()->get();
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
    
    $user = User::auth(params('email'), params('password'));

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
      $validator = new Validator();

      $validator->addField('title', 'Titulo')
                  ->required()
                  ->setMessage('El {label} es requerido.')
                ->addField('body', 'Contenido')
                  ->required()
                  ->setMessage('El {label} es requerido.')
                ->addField('status', 'Estado')
                  ->required()
                  ->setMessage('Debe seleccionar un estado.')
                ->addField('category_id', 'Categoría')
                  ->required()
                  ->setMessage('La {label} es requerida.');
      
      $result = $validator->run(params('post'));

      if( $result->isValid() ){
        $post = new Post(params('post'));
        $post->user_id = current_user()->id;
        $post->save();

        flash('success', 'Se ha creado el post "' . $post->title . '"');
        redirect('/admin');
      }else{
        flash('errors', $result->getErrors());
        redirect('/admin/posts/new');
      }
    });

    # Editar Post
    on('GET', '/:id/edit', function(){
      $post = Post::find(params('id'));
      $categories = Category::all();

      render('admin/posts/edit', ['post' => $post, 'categories' => $categories], 'admin/layout');
    });

    # Actualizar Post
    on('POST', '/:id/edit', function(){
      $post = Post::find(params('id'));

      $validator = new Validator();
      $validator->addField('title', 'Titulo')
                  ->required()
                  ->setMessage('El {label} es requerido.')
                ->addField('body', 'Contenido')
                  ->required()
                  ->setMessage('El {label} es requerido.')
                ->addField('status', 'Estado')
                  ->required()
                  ->setMessage('Debe seleccionar un estado.')
                ->addField('category_id', 'Categoría')
                  ->required()
                  ->setMessage('La {label} es requerida.');
      
      $result = $validator->run(params('post'));

      if( $result->isValid() ){
        $post->update(params('post'));

        flash('success', 'Se ha actualizado el post "' . $post->title . '"');
        redirect('/admin');
      }else{
        flash('errors', $result->getErrors());
        redirect('/admin/posts/' . $post->id . '/edit');
      }
    });

    # Eliminar Post
    on('GET', '/:id/destroy', function(){
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