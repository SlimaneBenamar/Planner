<?php

namespace App\Entity;

use App\Repository\GroupeRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=GroupeRepository::class)
 */
class Groupe
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;


    /**
     * @ORM\Column(type="integer")
     */
    private $nbrEtudiant;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $CodeGroupe;

    public function getId(): ?int
    {
        return $this->id;
    }


    public function getNbrEtudiant(): ?int
    {
        return $this->nbrEtudiant;
    }

    public function setNbrEtudiant(int $nbrEtudiant): self
    {
        $this->nbrEtudiant = $nbrEtudiant;

        return $this;
    }

    public function getCodeGroupe(): ?string
    {
        return $this->CodeGroupe;
    }

    public function setCodeGroupe(string $CodeGroupe): self
    {
        $this->CodeGroupe = $CodeGroupe;

        return $this;
    }
}
