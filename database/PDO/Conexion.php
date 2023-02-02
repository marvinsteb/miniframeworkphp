<?php

namespace Database\PDO;

use Database\Config\Config;

class Conexion extends Config
{
  private static $instancia;
  private $conexion;

  private function __construct()
  {
    $this->crear_conexion();
  }
  public static function getInstancia()
  {
    if (!self::$instancia instanceof self)
      self::$instancia = new self();
    return self::$instancia;
  }
  private function crear_conexion()
  {
    try 
    {
      $con = new \PDO("mysql:host={$this->server};dbname=$this->db;port={$this->port}", $this->user, $this->pass);
      $this->set_names($con);
      $this->conexion = $con;
    } catch (\PDOException $e) {
      echo "Falló la conexión: " . $e->getMessage();
    }
  }

  private function set_names($con)
  {
    $setnames = $con->prepare("SET NAMES 'utf8'");
    $setnames->execute();
  }

  public function get_database_conexion()
  {
     return $this->conexion;
  }
}
