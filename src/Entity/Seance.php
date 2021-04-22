<?php

namespace App\Entity;

use App\Repository\SeanceRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=SeanceRepository::class)
 */
class Seance
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;


    /**
     * @ORM\Column(type="datetime")
     */
    private $DateDebut;

    /**
     * @ORM\Column(type="datetime")
     */
    private $DateFin;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $Type;

    /**
     * @ORM\ManyToOne(targetEntity=Enseignant::class, inversedBy="seances")
     * @ORM\JoinColumn(nullable=false)
     */
    private $idEnseignant;

    /**
     * @ORM\ManyToOne(targetEntity=Formation::class, inversedBy="seances")
     * @ORM\JoinColumn(nullable=false)
     */
    private $idFormation;

    /**
     * @ORM\ManyToOne(targetEntity=Module::class, inversedBy="seances")
     * @ORM\JoinColumn(nullable=false)
     */
    private $idModule;

    /**
     * @ORM\OneToOne(targetEntity=Salle::class, cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $idSalle;

    public function getId(): ?int
    {
        return $this->id;
    }


    public function getDateDebut(): ?\DateTimeInterface
    {
        return $this->DateDebut;
    }

    public function setDateDebut(\DateTimeInterface $DateDebut): self
    {
        $this->DateDebut = $DateDebut;

        return $this;
    }

    public function getDateFin(): ?\DateTimeInterface
    {
        return $this->DateFin;
    }

    public function setDateFin(\DateTimeInterface $DateFin): self
    {
        $this->DateFin = $DateFin;

        return $this;
    }

    public function getType(): ?string
    {
        return $this->Type;
    }

    public function setType(string $Type): self
    {
        $this->Type = $Type;

        return $this;
    }

    public function getIdEnseignant(): ?Enseignant
    {
        return $this->idEnseignant;
    }

    public function setIdEnseignant(?Enseignant $idEnseignant): self
    {
        $this->idEnseignant = $idEnseignant;

        return $this;
    }

    public function getIdFormation(): ?Formation
    {
        return $this->idFormation;
    }

    public function setIdFormation(?Formation $idFormation): self
    {
        $this->idFormation = $idFormation;

        return $this;
    }

    public function getIdModule(): ?Module
    {
        return $this->idModule;
    }

    public function setIdModule(?Module $idModule): self
    {
        $this->idModule = $idModule;

        return $this;
    }

    public function getIdSalle(): ?Salle
    {
        return $this->idSalle;
    }

    public function setIdSalle(Salle $idSalle): self
    {
        $this->idSalle = $idSalle;

        return $this;
    }
}
