<?php

namespace App\Entity;

use App\Repository\MessageRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MessageRepository::class)]
class Message
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $Emetteur;

    #[ORM\Column(type: 'string', length: 255)]
    private $Recepteur;

    #[ORM\Column(type: 'text')]
    private $contenu;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEmetteur(): ?string
    {
        return $this->Emetteur;
    }

    public function setEmetteur(string $Emetteur): self
    {
        $this->Emetteur = $Emetteur;

        return $this;
    }

    public function getRecepteur(): ?string
    {
        return $this->Recepteur;
    }

    public function setRecepteur(string $Recepteur): self
    {
        $this->Recepteur = $Recepteur;

        return $this;
    }

    public function getContenu(): ?string
    {
        return $this->contenu;
    }

    public function setContenu(string $contenu): self
    {
        $this->contenu = $contenu;

        return $this;
    }
}
