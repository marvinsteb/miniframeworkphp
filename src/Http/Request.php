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
  private function getController()
  {
    // home -> HomeController
    $controller = ucfirst($this->controllerName);
    return "App\Controllers\\{$controller}Controller";
  }
  private function getMethod()
  {
    return $this->methodName;
  }
  public function send()
  {
    $controller = $this->getController();
    $method = $this->getMethod();

    $response = call_user_func([
      new $controller,
      $method
    ]);
    $response->send();

  }
}