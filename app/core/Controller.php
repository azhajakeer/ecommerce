<?php

class Controller {
    // Load model
    public function loadModel($model) {
        require_once '../app/models/' . $model . '.php';
        return new $model();
    }

    // Load view
    public function renderView($view, $data = []) {
        require_once '../app/views/' . $view . '.php';
    }
}
