<?php

class Project
{
    private $title;
    private $description;
    private $image;
    private $likes;
    private $dislikes;

    public function __construct($title, $description, $image,$likes = 0, $dislikes = 0)
    {
        $this->title = $title;
        $this->description = $description;
        $this->image = $image;
        $this->likes = $likes;
        $this->dislikes = $dislikes;
    }



    public function getTitle(): string
    {
        return $this->title;
    }

    public function setTitle(string $title)
    {
        $this->title = $title;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function setDescription(string $description)
    {
        $this->description = $description;
    }

    public function getImage(): string
    {
        return $this->image;
    }

    public function setImage(string $image)
    {
        $this->image = $image;
    }

    public function getLikes(): int
    {
        return $this->likes;
    }

    public function setLikes(int $likes)
    {
        $this->likes = $likes;
    }

    public function getDislikes(): int
    {
        return $this->dislikes;
    }

    public function setDislikes(int $dislikes)
    {
        $this->dislikes = $dislikes;
    }


}