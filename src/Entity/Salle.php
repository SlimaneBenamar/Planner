<?php

namespace App\Entity;

use App\Repository\SalleRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
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

    /**
     * @ORM\OneToMany(targetEntity=Seance::class, mappedBy="idSalle")
     */
    private $seances;

    public function __construct()
    {
        $this->seances = new ArrayCollection();
    }


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

    public function __toString()
    {
        $infoSalle = array($this->codeSalle, "Capacité:", $this->capaciteSalle);
        return implode(" ", $infoSalle);
    }

    /**
     * @return Collection|Seance[]
     */
    public function getSeances(): Collection
    {
        return $this->seances;
    }

    public function addSeance(Seance $seance): self
    {
        if (!$this->seances->contains($seance)) {
            $this->seances[] = $seance;
            $seance->setIdSalle($this);
        }

        return $this;
    }

    public function removeSeance(Seance $seance): self
    {
        if ($this->seances->removeElement($seance)) {
            // set the owning side to null (unless already changed)
            if ($seance->getIdSalle() === $this) {
                $seance->setIdSalle(null);
            }
        }

        return $this;
    }
}
