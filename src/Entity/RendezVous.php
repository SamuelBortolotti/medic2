<?php

namespace App\Entity;

use App\Repository\RendezVousRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: RendezVousRepository::class)]
class RendezVous
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $patient = null;

    #[ORM\Column(length: 255)]
    private ?string $Adresse = null;

    #[ORM\Column(type: Types::TIME_MUTABLE)]
    private ?\DateTimeInterface $heure = null;

    #[ORM\Column(length: 1024)]
    private ?string $raison = null;

    #[ORM\Column]
    private ?bool $urgence = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $specificites = null;

    #[ORM\Column(length: 255)]
    private ?string $praticien_id = null;

    public function getId(): ?int
    {
        return $this->patient;
    }

    public function getAdresse(): ?string
    {
        return $this->Adresse;
    }

    public function setAdresse(string $Adresse): static
    {
        $this->Adresse = $Adresse;

        return $this;
    }

    public function getHeure(): ?\DateTimeInterface
    {
        return $this->heure;
    }

    public function setHeure(\DateTimeInterface $heure): static
    {
        $this->heure = $heure;

        return $this;
    }

    public function getRaison(): ?string
    {
        return $this->raison;
    }

    public function setRaison(string $raison): static
    {
        $this->raison = $raison;

        return $this;
    }

    public function isUrgence(): ?bool
    {
        return $this->urgence;
    }

    public function setUrgence(bool $urgence): static
    {
        $this->urgence = $urgence;

        return $this;
    }

    public function getSpecificites(): ?string
    {
        return $this->specificites;
    }

    public function setSpecificites(?string $specificites): static
    {
        $this->specificites = $specificites;

        return $this;
    }

    public function getPraticien_id(): ?string
    {
        return $this->praticien;
    }

    public function setPraticien_id(string $praticien): static
    {
        $this->praticien = $praticien;

        return $this;
    }
}
