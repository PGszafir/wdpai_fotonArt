<?php

require_once 'AppController.php';
require_once __DIR__.'/../models/Project.php';
require_once __DIR__.'/../repository/ProjectRepository.php';

class ProjectController extends AppController
{
    const MAX_FILE_SIZE = 1024*1024;
    const SUPORTED_TYPES = ['img/png','img/jpg'];
    const UPLOAD_DIRECTORY = '/../public/uploads/';

    private $messages = [];
    private $projectRepository;


    public function __construct()
    {
        parent::__construct();
        $this->projectRepository = new ProjectRepository();
    }

    public function projects()
    {
        $projects = $this->projectRepository->getProjects();
        $this->render('projects',['projects' => $projects]);
    }

    public function search()
    {
        //todo
        $contentType = isset($_SERVER["CONTENT_TYPE"]) ? trim($_SERVER["CONTENT_TYPE"]) : '';
        if($contentType === "application/json"){
            $content = trim(file_get_contents("php://input"));
            $decoded = json_decode($content, true);

            header('Content-type: application/json');
            http_response_code(200);

            echo json_encode($this->projectRepository->getProjectByTitle($decoded['search']));
        }
    }

    public function addProject()
    {
        if($this->isPost() && is_uploaded_file($_FILES['file']['tmp_name'])  && $this->validate($_FILES['file'])){
            //to do
            move_uploaded_file(
                $_FILES['file']['tmp_name'],
                dirname(__DIR__).self::UPLOAD_DIRECTORY.$_FILES['file']['name']
            );

            $project = new Project($_POST['title'], $_POST['description'], $_FILES['file']['name']);
            //$this->projectRepository->
            $this->projectRepository->addProject($project);

            return $this->render('projects', [
                'projects' => $this->projectRepository->getProjects(),
                'messages' => $this->messages, 'project' => $project
            ]);
        }

        $this->render('add-project',  ['messages' => $this->messages]);
    }



    private function validate(array $file): bool
    {
        if($file['size'] > self::MAX_FILE_SIZE){
            $this->messages[] = 'File is too large for destination file system.';
            return false;
        }

        if(!isset($file['type']) && !in_array($file['type'], self::SUPORTED_TYPES)){
            $this->messages[] = 'File type is not supported';
            return false;
        }
        return true;
    }

}