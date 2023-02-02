<?php

namespace Database\MySQLi;

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
    $mysqli = new \mysqli($this->server, $this->user, $this->pass, $this->db, $this->port);
    $this->validar_conexion($mysqli);
    $this->set_names($mysqli);
    $this->conexion = $mysqli;
  }
  
  private function set_names($mysqli)
  {
    $setnames = $mysqli->prepare("SET NAMES 'utf8'");
    $setnames->execute();
  }

  private function validar_conexion(&$mysqli)
  {
    if ($mysqli->connect_errno)
      die("Falló la conexión: {$mysqli->connect_error}");
  }

  public function get_database_conexion()
  {
    return $this->conexion;
  }
}