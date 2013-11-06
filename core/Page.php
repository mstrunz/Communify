<?php
class Page{
    private $id;
    private $name;
    private $title;
    
    public function setId($id)
    {
        $this->id = $id;
    }
    public function getId()
    {
        return $this->id;
    }
    public function setName($name)
    {
        $this->name = $name;
    }
    public function getName()
    {
        return $this->name;
    }
    public function setTitle($title)
    {
        $this->title = $title;
    }
    
}