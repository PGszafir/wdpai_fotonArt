<?php

require_once 'AppController.php';

class ProjectController extends AppController
{
    public function addProject()
    {
        $this->render('add-project');
    }

}