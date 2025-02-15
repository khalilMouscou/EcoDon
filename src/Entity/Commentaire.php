<?php

namespace App\Entity;

use App\Repository\CommentaireRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\UX\Turbo\Attribute\Broadcast;

#[ORM\Entity(repositoryClass: CommentaireRepository::class)]
#[Broadcast]
class Commentaire
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $contenu = null;

    #[ORM\ManyToOne(targetEntity: User::class ,inversedBy: 'Commentaire')]
    #[ORM\JoinColumn(name: "idUser",referencedColumnName: "id")]
    private ?User $user = null;

    public function getuser(): ?string
    {
        return $this->user;
    }

    public function setuser(?User $user): static
    {
        $this->user = $user;
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

    public function getId(): ?int
    {
        return $this->id;
    }
}
