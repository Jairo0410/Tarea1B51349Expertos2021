<?php

    class FrontController{
        
        static function main(){
            require __DIR__.'/Constants.php';
            require __DIR__.'/Utility.php';
           
            if(!empty($_GET['controller']))
                $nameController=titleize_underscore($_GET['controller']).'Controller';
            else 
                $nameController='StyleKolbController';
            
            if(!empty($_GET['action']))
                $action=titleize_underscore($_GET['action']);
            else  
                $action='default';
            
            $routeToController = routeController . $nameController.'.php';
            
            if(is_file($routeToController))
                require_once $routeToController;
            else{
                require_once routeController.'DefaultController.php';
                $controller = new DefaultController();
                $controller->notFound('Controlador '.$nameController. ' no encontrado');
                return FALSE;
            }
            
            if(is_callable(array($nameController, $action))==FALSE){
                require_once routeController.'DefaultController.php';
                $controller = new DefaultController();
                $controller->notFound($nameController.'->'.$action.' no existe');
                return FALSE;
            }
            
            $controller=new $nameController();
            $controller->$action();
            
        } // main
        
    } // fin de clase 

?>
