<?php

namespace Spolischook\Model;

class Article
{
    protected $title;
    
    public function setTitle($title)
    {
        $this->title = $title;
    }
    
    public function getTitle()
    {
        return $this->title;
    }
}

