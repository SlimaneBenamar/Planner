<?php

namespace App\Entity;

use App\Repository\SalleRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=SalleRepository::class)
 */
class Salle
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
    private $codeSalle;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $capaciteSalle;

    public function getId(): ?int
    {
        return $this->id;
    }




    public function getCodeSalle(): ?string
    {
        return $this->codeSalle;
    }

    public function setCodeSalle(string $codeSalle): self
    {
        $this->codeSalle = $codeSalle;

        return $this;
    }

    public function getCapaciteSalle(): ?int
    {
        return $this->capaciteSalle;
    }

    public function setCapaciteSalle(?int $capaciteSalle): self
    {
        $this->capaciteSalle = $capaciteSalle;

        return $this;
    }
}
