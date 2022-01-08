<?php

require_once 'Repository.php';
require_once __DIR__.'/../models/Project.php';

class ProjectRepository extends Repository
{
    public function getProject(string $email): ?Project
    {
        $stmt = $this->database->connect()->prepare('
            SELECT * FROM public.projects WHERE email = :email
        ');
        $stmt->bindParam(':email',$email,PDO::PARAM_STR);
        $stmt->execute();

        $project = $stmt->fetch(PDO::FETCH_ASSOC);

        if($project == false){
            return null; //!!!
        }

        return new Project(
            $project['email'],
            $project['password'],
            $project['name'],
            $project['surname']
        );
    }
}