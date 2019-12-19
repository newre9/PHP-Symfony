<?php

namespace App\Entity\Admin;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\Admin\CategoryRepository")
 */
class Category
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=25, nullable=true)
     */
    private $parentid;

    /**
     * @ORM\Column(type="string", length=25, nullable=true)
     */
    private $title;

    /**
     * @ORM\Column(type="string", length=25, nullable=true)
     */
    private $description;

    /**
     * @ORM\Column(type="string", length=25, nullable=true)
     */
    private $keywords;



    /**
     * @ORM\Column(type="string", length=25, nullable=true)
     */
    private $status;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getParentid(): ?string
    {
        return $this->parentid;
    }

    public function setParentid(string $parentid): self
    {
        $this->parentid = $parentid;

        return $this;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getKeywords(): ?string
    {
        return $this->keywords;
    }

    public function setKeywords(string $keywords): self
    {
        $this->keywords = $keywords;

        return $this;
    }


    public function getCerate(): ?string
    {
        return $this->cerate;
    }

    public function setCerate(string $cerate): self
    {
        $this->cerate = $cerate;

        return $this;
    }

    public function getUpdateat(): ?string
    {
        return $this->updateat;
    }

    public function setUpdateat(string $updateat): self
    {
        $this->updateat = $updateat;

        return $this;
    }

    public function getStatus(): ?string
    {
        return $this->status;
    }

    public function setStatus(string $status): self
    {
        $this->status = $status;

        return $this;
    }
}
