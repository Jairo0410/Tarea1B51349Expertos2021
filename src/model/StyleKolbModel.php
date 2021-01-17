<?php

require_once routeLibs.'Connection.php';

class StyleKolbModel{

  public function __construct(){
      ;
  }

  public function get_data(){
      return array_map('str_getcsv', file(__DIR__.'../csv/estilorecinto.csv'));
  }
}

?>