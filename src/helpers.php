<?php
if(! function_exists('view'))
{
  function view($view)
  {
    return new App\Http\Response($view);
  }
}
function dd($value)
{
  echo "<pre>";
  var_dump($value);
  echo "<pre>";
  die();
} 
