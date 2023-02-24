<?php
namespace App\Http;
use function App\dd;
class Request {
  protected $segmentsUrl = [];
  protected $controllerName = "Home";
  protected $methodName = "index";
  public function __construct()
  {
    $this->segmentsUrl =explode("/",$_SERVER['REQUEST_URI']);

    $this->setController();
    $this->setMethod();
  }
  private function setController()
  {
    $this->controllerName = empty($this->segmentsUrl[1]) 
                            ? 'home' 
                            : $this->segmentsUrl[1] ;
  }
  private function setMethod()
  {
    $this->methodName = empty($this->segmentsUrl[2]) 
                            ? 'index' 
                            : $this->segmentsUrl[2] ;
  }
  public function send()
  {
  }
}