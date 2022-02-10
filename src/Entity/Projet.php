<?php

namespace App\Entity;

use App\Repository\ProjetRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ProjetRepository::class)]
class Projet
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'date')]
    private $date_debut;

    #[ORM\Column(type: 'date')]
    private $deadline;

    #[ORM\Column(type: 'string', length: 255)]
    private $responsable;

    #[ORM\Column(type: 'string', length: 255)]
    private $equipe;

    #[ORM\ManyToOne(targetEntity: Service::class, inversedBy: 'projets')]
    private $service;

    #[ORM\OneToMany(mappedBy: 'projet', targetEntity: Technologie::class)]
    private $Technologie;

    public function __construct()
    {
        $this->Technologie = new ArrayCollection();
    }





    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDateDebut(): ?\DateTimeInterface
    {
        return $this->date_debut;
    }

    public function setDateDebut(\DateTimeInterface $date_debut): self
    {
        $this->date_debut = $date_debut;

        return $this;
    }

    public function getDeadline(): ?\DateTimeInterface
    {
        return $this->deadline;
    }

    public function setDeadline(\DateTimeInterface $deadline): self
    {
        $this->deadline = $deadline;

        return $this;
    }

    public function getResponsable(): ?string
    {
        return $this->responsable;
    }

    public function setResponsable(string $responsable): self
    {
        $this->responsable = $responsable;

        return $this;
    }

    public function getEquipe(): ?string
    {
        return $this->equipe;
    }

    public function setEquipe(string $equipe): self
    {
        $this->equipe = $equipe;

        return $this;
    }

    public function getService(): ?Service
    {
        return $this->service;
    }

    public function setService(?Service $service): self
    {
        $this->service = $service;

        return $this;
    }

    /**
     * @return Collection|Technologie[]
     */
    public function getTechnologie(): Collection
    {
        return $this->Technologie;
    }

    public function addTechnologie(Technologie $technologie): self
    {
        if (!$this->Technologie->contains($technologie)) {
            $this->Technologie[] = $technologie;
            $technologie->setProjet($this);
        }

        return $this;
    }

    public function removeTechnologie(Technologie $technologie): self
    {
        if ($this->Technologie->removeElement($technologie)) {
            // set the owning side to null (unless already changed)
            if ($technologie->getProjet() === $this) {
                $technologie->setProjet(null);
            }
        }

        return $this;
    }
}
