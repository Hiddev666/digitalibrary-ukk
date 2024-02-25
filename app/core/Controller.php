<?php

class Controller {
    public function render($view, $data = []) {
        extract($data);
        require_once("../app/views/$view.php");
    }
    
    public function getModel($model) {
        require_once("../app/models/$model.php");
        return new $model;
    }
}