<?php

namespace App\Entity;

use App\Repository\CourRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\UX\Turbo\Attribute\Broadcast;

#[ORM\Entity(repositoryClass: CourRepository::class)]
#[Broadcast]
class Cour
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id_cour;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $cour = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $decription = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $contenu = null;

    public function getIdCour(): ?int
    {
        return $this->id_cour;
    }

    public function setIdCour(int $id_cour): static
    {
        $this->id_cour = $id_cour;

        return $this;
    }

    public function getCour(): ?string
    {
        return $this->cour;
    }

    public function setCour(?string $cour): static
    {
        $this->cour = $cour;

        return $this;
    }

    public function getDecription(): ?string
    {
        return $this->decription;
    }

    public function setDecription(?string $decription): static
    {
        $this->decription = $decription;

        return $this;
    }

    public function getContenu(): ?string
    {
        return $this->contenu;
    }

    public function setContenu(?string $contenu): static
    {
        $this->contenu = $contenu;

        return $this;
    }

}
