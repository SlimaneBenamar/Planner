<?php

namespace App\Entity;

use App\Repository\EnseignantRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=EnseignantRepository::class)
 */
class Enseignant
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;


    /**
     * @ORM\Column(type="string", length=50)
     */
    private $nomEnseignant;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $prenomEnseignant;

    public function getId(): ?int
    {
        return $this->id;
    }


    public function getNomEnseignant(): ?string
    {
        return $this->nomEnseignant;
    }

    public function setNomEnseignant(string $nomEnseignant): self
    {
        $this->nomEnseignant = $nomEnseignant;

        return $this;
    }

    public function getPrenomEnseignant(): ?string
    {
        return $this->prenomEnseignant;
    }

    public function setPrenomEnseignant(string $prenomEnseignant): self
    {
        $this->prenomEnseignant = $prenomEnseignant;

        return $this;
    }
}
