<?php

namespace App\Entity\Admin;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\Admin\SettingsRepository")
 */
class Settings
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
     * @ORM\Column(type="string", length=36, nullable=true)
     */
    private $company;

    /**
     * @ORM\Column(type="string", length=200, nullable=true)
     */
    private $address;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $fax;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $telefon;

    /**
     * @ORM\Column(type="string", length=63, nullable=true)
     */
    private $email;

    /**
     * @ORM\Column(type="string", length=85, nullable=true)
     */
    private $smtpserver;

    /**
     * @ORM\Column(type="string", length=200, nullable=true)
     */
    private $smtpmail;

    /**
     * @ORM\Column(type="string", length=200, nullable=true)
     */
    private $smtppasw;

    /**
     * @ORM\Column(type="string", length=200, nullable=true)
     */
    private $smtpport;

    /**
     * @ORM\Column(type="string", length=200, nullable=true)
     */
    private $aboutus;

    /**
     * @ORM\Column(type="string", length=200, nullable=true)
     */
    private $contact;

    /**
     * @ORM\Column(type="string", length=200, nullable=true)
     */
    private $referans;

    /**
     * @ORM\Column(type="string", length=25, nullable=true)
     */
    private $status;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(?string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getKeywords(): ?string
    {
        return $this->keywords;
    }

    public function setKeywords(?string $keywords): self
    {
        $this->keywords = $keywords;

        return $this;
    }

    public function getCompany(): ?string
    {
        return $this->company;
    }

    public function setCompany(?string $company): self
    {
        $this->company = $company;

        return $this;
    }

    public function getAddress(): ?string
    {
        return $this->address;
    }

    public function setAddress(?string $address): self
    {
        $this->address = $address;

        return $this;
    }

    public function getFax(): ?int
    {
        return $this->fax;
    }

    public function setFax(?int $fax): self
    {
        $this->fax = $fax;

        return $this;
    }

    public function getTelefon(): ?int
    {
        return $this->telefon;
    }

    public function setTelefon(?int $telefon): self
    {
        $this->telefon = $telefon;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(?string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getSmtpserver(): ?string
    {
        return $this->smtpserver;
    }

    public function setSmtpserver(?string $smtpserver): self
    {
        $this->smtpserver = $smtpserver;

        return $this;
    }

    public function getSmtpmail(): ?string
    {
        return $this->smtpmail;
    }

    public function setSmtpmail(?string $smtpmail): self
    {
        $this->smtpmail = $smtpmail;

        return $this;
    }

    public function getSmtppasw(): ?string
    {
        return $this->smtppasw;
    }

    public function setSmtppasw(?string $smtppasw): self
    {
        $this->smtppasw = $smtppasw;

        return $this;
    }

    public function getSmtpport(): ?string
    {
        return $this->smtpport;
    }

    public function setSmtpport(?string $smtpport): self
    {
        $this->smtpport = $smtpport;

        return $this;
    }

    public function getAboutus(): ?string
    {
        return $this->aboutus;
    }

    public function setAboutus(?string $aboutus): self
    {
        $this->aboutus = $aboutus;

        return $this;
    }

    public function getContact(): ?string
    {
        return $this->contact;
    }

    public function setContact(string $contact): self
    {
        $this->contact = $contact;

        return $this;
    }

    public function getReferans(): ?string
    {
        return $this->referans;
    }

    public function setReferans(?string $referans): self
    {
        $this->referans = $referans;

        return $this;
    }

    public function getStatus(): ?string
    {
        return $this->status;
    }

    public function setStatus(?string $status): self
    {
        $this->status = $status;

        return $this;
    }
}
