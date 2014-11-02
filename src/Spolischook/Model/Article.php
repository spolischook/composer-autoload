<?php

namespace Spolischook\Model;

class Article extends AbstractARModel
{
    /** @var  string */
    protected $title;

    /**
     * @param $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }
}

