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
}
