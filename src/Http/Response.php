<?Php
namespace App\Http;
class Response 
{
  protected $view; //array, json pdf..
  public function __construct($view)
  {
    $this->view = $view;
  }
  public function getView()
  {
    return $this->view;
  }
  public function send()
  {
    $view = $this->view;
    $content = file_get_contents(__DIR__ . "/../../views/{$view}.php");
    require __DIR__ . "/../../views/layout.php";
  }
}
