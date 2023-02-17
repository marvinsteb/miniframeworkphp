<?php
namespace App\Controller;

use Database\PDO\Conexion;

use function App\dd;

class EstudiantePDOController
{
  private $con;

  public function __construct()
  {
    $this->con = Conexion::getInstancia()->get_database_conexion();
  }
  public function index()
  {
    $sqlQuery = "SELECT * FROM estudiante;";
    $stmt = $this->con->prepare($sqlQuery);
    $stmt->execute();
    $results = $stmt->fetchAll(\PDO::FETCH_ASSOC);
    return $results;
  }
  public function create(){}
  public function store($data)
  {
    $sqlQuery = "INSERT INTO estudiante(dpi,nombres,apellidos,estado,fecha_nacimiento)
                VALUES(:dpi,:nombres,:apellidos,:estado,:fecha_nacimiento);";
    
    $stmt = $this->con->prepare($sqlQuery);
    /*
    $stmt->execute([
      ":dpi"=>$data['dpi'],
      ":nombres"=>$data['nombres'],
      ":apellidos"=>$data['apellidos'],
      ":estado"=>$data['estado'],
      ":fecha_nacimiento"=>$data['fecha_nacimiento'],
    ]);
    */
    // usando bindParam
    /*
    $stmt->bindParam(":dpi",$data['dpi']);
    $stmt->bindParam(":nombres",$data['nombres']);
    $stmt->bindParam(":apellidos",$data['apellidos']);
    $stmt->bindParam(":estado",$data['estado']);
    $stmt->bindParam(":fecha_nacimiento",$data['fecha_nacimiento']);
    $stmt->execute();
    */
    // usando bindValue 
     /*
    $stmt->bindParam(":dpi",$data['dpi']);
    $stmt->bindParam(":nombres",$data['nombres']);
    $stmt->bindParam(":apellidos",$data['apellidos']);
    $stmt->bindParam(":estado",$data['estado']);
    $stmt->bindParam(":fecha_nacimiento",$data['fecha_nacimiento']);
    // Realiza el cambio en la variable antes de ejecutar la consulta
    $data["apellidos"] = "otro";
    $stmt->execute();
    */
    // usando bindValue no se modifica la variable al ejecutar la consulta
    $stmt->bindValue(":dpi",$data['dpi']);
    $stmt->bindValue(":nombres",$data['nombres']);
    $stmt->bindValue(":apellidos",$data['apellidos']);
    $stmt->bindValue(":estado",$data['estado']);
    $stmt->bindValue(":fecha_nacimiento",$data['fecha_nacimiento']);
    // Realiza el cambio en la variable antes de ejecutar la consulta
    $data["apellidos"] = "otro 2";
    $stmt->execute();

    echo "se agregaron {$stmt->rowCount()} filas en la base de datos \n";
  }
  public function show(int $id) : array
  {
    $sqlQuery= "SELECT * FROM estudiante WHERE idestudiante = :id";
    $stmt = $this->con->prepare($sqlQuery);
    $stmt->execute([
      ":id" => $id
    ]);
    $result = $stmt->fetch(\PDO::FETCH_ASSOC); 
    return $result;
  }
  public function edit(){}
  public function update(){}
  public function destroy($id)
  {
    $this->con->BeginTransaction();
    $query = "DELETE FROM estudiante WHERE idestudiante = :id";
    $stmt = $this->con->prepare($query);
    $stmt->execute([
      ":id" => $id,
    ]);
    $respuesta = readline("¿Estas seguro? Responde Y/N");
    if($respuesta == "N")
      $this->con->rollBack();
    else 
      $this->con->commit();
  }
  public function __destruct() {
    //var_dump($this->con);
  }
}
