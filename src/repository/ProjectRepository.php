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

    public function getProjectByTitle(string $searchString): ?Project
    {
        $searchString = '%'.strtolower($searchString).'%';


        $stmt = $this->database->connect()->prepare('
            SELECT * FROM public.projects WHERE LOWER(title) LIKE :search OR LOWER(description) LIKE :search 
        ');
        $stmt->bindParam(':search',$searchString,PDO::PARAM_STR);
        $stmt->execute();


        return $stmt->fetchAll(PDO::FETCH_ASSOC);
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

    public function getProjects(): array
    {
        $result = [];
        $stmt = $this->database->connect()->prepare('
            SELECT * FROM projects
        ');
        $stmt->execute();
        $projects = $stmt->fetchAll();

        foreach ($projects as $project){
            $result[] = new Project(
                $project['title'],
                $project['description'],
                $project['img'],
                $projects['likes'],
                $project['dislikes']
            );
        }

        return $result;
    }
}