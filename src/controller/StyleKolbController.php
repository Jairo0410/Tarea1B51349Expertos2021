<?php

require_once routeLibs.'View.php';
require_once routeModel.'StyleKolbModel.php';

class StyleKolbController{

    public function default() {
        $this->style();
    }

 	public function style() {
        $model = new StyleKolbModel();
        $data = $model->get_data();
        echo 'Printing data: ';
        print_r($data);
 	    view('style_kolb.php');
    }
}

?>