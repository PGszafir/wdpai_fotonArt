<?php

require_once 'Repository.php';
require_once __DIR__.'/../models/Project.php';

class ProjectRepository extends Repository
{
    public function getProject(string $id_project): ?Project
    {
        $stmt = $this->database->connect()->prepare('
            SELECT * FROM public.projects WHERE id_project = :id_project
        ');
        $stmt->bindParam(':id_project',$id_project,PDO::PARAM_INT);
        $stmt->execute();

        $project = $stmt->fetch(PDO::FETCH_ASSOC);

        if($project == false){
            return null; //!!!
        }

        return new Project(
            $project['title'],
            $project['description'],
            $project['img']
        );
    }

    public function addProject(Project $project)
    {
        $date = new DateTime();
        $stmt = $this->database->connect()->prepare('
            INSERT INTO projects (id_user_deflaut,title, description, img, created_at)
            VALUES (?, ?, ?, ?, ?)
        ');
        $id_user = 1;
        $stmt->execute([
            $id_user,
            $project->getTitle(),
            $project->getDescription(),
            $project->getImage(),
            $date->format('Y-m-d')
        ]);
    }
}