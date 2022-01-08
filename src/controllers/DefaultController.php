<?php

require_once 'AppController.php';

class DefaultController extends AppController {

    public function index()
    {
            $this->render('login');//, ['message' -> "Hello world!"]
    }

    public function profile()
    {
        $this->render('profile');
    }
}