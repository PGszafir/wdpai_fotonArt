<?php

require_once 'AppController.php';

class DefaultController extends AppController {

    public function index()
    {
        $this->render('login');
    }

    public function dashboard()
    {
        //todo get data from database
        $items = ['kurtka','telefon','szafa'];
        $this->render('dashboard');
    }
}