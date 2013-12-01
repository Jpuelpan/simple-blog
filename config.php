<?php 
require_once('vendor/autoload.php');

use Illuminate\Database\Capsule\Manager as Capsule;

# 
# Configuración para Dispatch
# 
config([
  'dispatch.views' => './views',
  'dispatch.layout' => 'layout',
  'dispatch.flash_cookie' => '_F'
]);

#
# Configuración para Eloquent ORM
# 
$db_data = require_once('database.php');

if( getenv('DB_CONFIG') ){
  $db_data = json_decode(getenv('DB_CONFIG'), true) or die('El formato de DB_CONFIG es incorrecto');
}

$capsule = new Capsule;
$capsule->addConnection($db_data);
$capsule->bootEloquent();

?>