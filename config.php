<?php 
require_once('vendor/autoload.php');

use Illuminate\Database\Capsule\Manager as Capsule;

# Configuración para Dispatch
config([
  'dispatch.views' => './views',
  'dispatch.layout' => 'layout',
  'dispatch.flash_cookie' => '_F'
]);

# Configuración para Eloquent ORM
$db_data = require_once('database.php');
$capsule = new Capsule;
$capsule->addConnection($db_data);
$capsule->bootEloquent();

# Cargar todos los modelos
foreach(glob('./models/*.php') as $file){
  require $file;
}
?>