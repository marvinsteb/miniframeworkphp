<?php

use App\Controller\EstudianteController;
use App\Controller\EstudiantePDOController;
use App\Enums\EstudianteEstadoEnum as enumEstudiante;
use function App\dd;

require_once("vendor/autoload.php");
$estudiantes_controller = new EstudianteController();
$estudiantes_controller->store([
  "dpi" => "1234567891234",
  "nombres" => "marvin esteban",
  "apellidos" => "menchu socop",
  "fecha_nacimiento"=>"2023-01-01 00:00:00",
  "estado"=> enumEstudiante::Activo->value,
]);

$estudiante2 = new EstudianteController();
$estudiante2->store([
  "dpi" => "123456789",
  "nombres" => "esteban",
  "apellidos" => "menchu",
  "fecha_nacimiento"=>"2023-01-01 00:00:00",
  "estado"=> enumEstudiante::Inactivo->value,
]);
/*
$estudiantes_controller = new EstudianteController();
$estudiantes_controller->store([
  "dpi" => "1234567891234",
  "nombres" => "marvin esteban",
  "apellidos" => "menchu socop",
  "fecha_nacimiento"=>"2023-01-01 00:00:00",
  "estado"=> enumEstudiante::Activo->value,
]);

$listadoEstudiantes = $estudiantes_controller->index();
foreach($listadoEstudiantes as $estudiante ){
  echo "\n";
  echo "{$estudiante['idestudiante']}  {$estudiante['dpi']} {$estudiante['nombres']} {$estudiante['apellidos']}" ;
}

var_dump($estudiantes_controller->show(1));
*/
/*
 $estudiante = new EstudiantePDOController(); 
 $estudiante->store([
  "dpi" => "1234567891234",
  "nombres" => "marvin esteban",
  "apellidos" => "menchu socop",
  "fecha_nacimiento"=>"2023-01-01 00:00:00",
  "estado"=> enumEstudiante::Activo->value,
]);
*/

$estudiante = new EstudiantePDOController();
$listaEstudiantes = $estudiante->index();

var_dump($listaEstudiantes);