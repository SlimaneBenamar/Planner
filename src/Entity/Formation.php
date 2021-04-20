<?php

namespace App\Entity;

use App\Repository\FormationRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=FormationRepository::class)
 */
class Formation
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
    private $idFormation;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $libFormation;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdFormation(): ?int
    {
        return $this->idFormation;
    }

    public function setIdFormation(int $idFormation): self
    {
        $this->idFormation = $idFormation;

        return $this;
    }

    public function getLibFormation(): ?string
    {
        return $this->libFormation;
    }

    public function setLibFormation(string $libFormation): self
    {
        $this->libFormation = $libFormation;

        return $this;
    }
}
