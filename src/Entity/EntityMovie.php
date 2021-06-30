<?php

namespace Src\Entity;


class EntityMovie
{

    protected $id;
    protected $name;
    protected $link;
    protected $slug;
    protected $yearofcreated;
    protected $content;
    protected $bestseller;
    protected $headerhero;
    protected $categoryid;
    protected $viewid;
    protected $likeid;
    protected $image;


    function getId()
    {

        return $this->id;
    }

    function getName()
    {

        return $this->name;
    }

    function getLink()
    {

        return $this->link;
    }

    function getSlug()
    {

        return $this->slug;
    }

    function getYearofcreated()
    {

        return $this->yearorcreated;
    }

    function getContent()
    {

        return $this->content;
    }

    function getBestseller()
    {

        return $this->bestseller;
    }

    function getHeaderhero()
    {

        return $this->headerhero;
    }

    function getCategoryid()
    {

        return $this->categoryid;
    }

    function getViewid()
    {

        return $this->viewid;
    }

    function getLikeid()
    {

        return $this->likeid;
    }

    function getImage()
    {

        return $this->image;
    }


    //////////////////////////////

    function setId($id)
    {

        $this->id = $id;
    }


    function setName($name)
    {

        $this->name = $name;
    }

    function setLink($link)
    {

        $this->link = $link;
    }

    function setSlug($slug)
    {

        $this->slug = $slug;
    }

    function setYearofcreated($yearorcreated)
    {

        $this->yearorcreated = $yearorcreated;
    }

    function setContent($content)
    {

        $this->content = $content;
    }

    function setBestseller($bestseller)
    {

        $this->bestseller = $bestseller;
    }

    function setHeaderhero($headerhero)
    {

        $this->headerhero = $headerhero;
    }

    function setCategoryid($categoryid)
    {

        $this->categoryid = $categoryid;
    }

    function setViewid($viewid)
    {

        $this->viewid = $viewid;
    }

    function setLikeid($likeid)
    {

        $this->likeid = $likeid;
    }

    function setImage($image)
    {

        $this->image = $image;
    }
}
