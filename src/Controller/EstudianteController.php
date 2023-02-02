<?php
namespace App\Controller;

use Database\MySQLi\Conexion;

class EstudianteController
{
  private $con;

  public function __construct()
  {
    $this->con = Conexion::getInstancia()->get_database_conexion();
  }
  public function index()
  {
    $query = "SELECT idestudiante,dpi,nombres,apellidos,estado FROM estudiante";
    $result = $this->con->query($query);
    $data = $result->fetch_all(MYSQLI_ASSOC);
    return $data;
  }
  public function create(){}
  public function store($data)
  {
    $query = "INSERT INTO estudiante
                  (idestudiante,dpi,nombres,apellidos,estado,fecha_nacimiento)
                  VALUES
                  (?,?,?,?,?,?);";
    $stmt = $this->con->prepare($query);
    $id = NULL;
    $dpi = $data['dpi'];
    $nombres = $data['nombres'];
    $apellidos = $data['apellidos'];
    $estado = $data['estado'];
    $fecha_nacimiento = $data['fecha_nacimiento'];
    $stmt->bind_param("isssis",$id,$dpi,$nombres,$apellidos,$estado,$fecha_nacimiento);
    $stmt->execute();
    
    echo "se agregaron {$stmt->affected_rows} filas en la base de datos";
  }
  public function show($id)
  {
    $query = "SELECT * FROM estudiante WHERE idestudiante = ?";
    $stmt = $this->con->prepare($query);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $estudiante = $result->fetch_assoc();
    return $estudiante;
  }
  public function edit(){}
  public function update(){}
  public function Destroy(){}
}
