<?php
namespace App\Controllers;

class HomeController
{
  /** muestra una lista de este recurso */
  public function index(){
    return view('home');
  }
  /** muestra un formulario para crear un nuevo recurso*/
  public function create(){}
  /** gurda el recurso del metodo create() en la base de datos */
  public function store(){}
  /** Muestra un único recurso especificado*/
  public function show(){}
  /**  Muestra el formulario para editar un recurso*/
  public function edit(){}
  /**  Actualiza un recurso específico en la base de datos*/
  public function update(){}
  /** Elimina un recurso específico de la base de datos*/
  public function Destroy(){}
}
