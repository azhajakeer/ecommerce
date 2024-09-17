<?php

class HomeController extends Controller{
    public function index(){

        $this->renderView('home', [], 'Book List');

    }
}