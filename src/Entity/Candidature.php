<?php

namespace App\Entity;

use App\Repository\CandidatureRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CandidatureRepository::class)
 */
class Candidature
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="date")
     */
    private $Date_Creation;

    /**
     * @ORM\Column(type="date")
     */
    private $Date_naissance;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Nationnalite;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $photo;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $CV;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Description;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Email;

    /**
     * @ORM\Column(type="integer")
     */
    private $Telephone;

    /**
     * @ORM\Column(type="integer")
     */
    private $Etat_Candidature;

    /**
     * @ORM\ManyToOne(targetEntity=OffreEmploi::class, inversedBy="candidatures")
     * @ORM\JoinColumn(nullable=false)
     */
    private $OffreEmploi;

    /**
     * @ORM\OneToOne(targetEntity=RendezVous::class, cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $Rendez_vous;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="candidatures")
     * @ORM\JoinColumn(nullable=false)
     */
    private $user;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDateCreation(): ?\DateTimeInterface
    {
        return $this->Date_Creation;
    }

    public function setDateCreation(\DateTimeInterface $Date_Creation): self
    {
        $this->Date_Creation = $Date_Creation;

        return $this;
    }

    public function getDateNaissance(): ?\DateTimeInterface
    {
        return $this->Date_naissance;
    }

    public function setDateNaissance(\DateTimeInterface $Date_naissance): self
    {
        $this->Date_naissance = $Date_naissance;

        return $this;
    }

    public function getNationnalite(): ?string
    {
        return $this->Nationnalite;
    }

    public function setNationnalite(string $Nationnalite): self
    {
        $this->Nationnalite = $Nationnalite;

        return $this;
    }

    public function getPhoto(): ?string
    {
        return $this->photo;
    }

    public function setPhoto(string $photo): self
    {
        $this->photo = $photo;

        return $this;
    }

    public function getCV(): ?string
    {
        return $this->CV;
    }

    public function setCV(string $CV): self
    {
        $this->CV = $CV;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->Description;
    }

    public function setDescription(string $Description): self
    {
        $this->Description = $Description;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->Email;
    }

    public function setEmail(string $Email): self
    {
        $this->Email = $Email;

        return $this;
    }

    public function getTelephone(): ?int
    {
        return $this->Telephone;
    }

    public function setTelephone(int $Telephone): self
    {
        $this->Telephone = $Telephone;

        return $this;
    }

    public function getEtatCandidature(): ?int
    {
        return $this->Etat_Candidature;
    }

    public function setEtatCandidature(int $Etat_Candidature): self
    {
        $this->Etat_Candidature = $Etat_Candidature;

        return $this;
    }

    public function getOffreEmploi(): ?OffreEmploi
    {
        return $this->OffreEmploi;
    }

    public function setOffreEmploi(?OffreEmploi $OffreEmploi): self
    {
        $this->OffreEmploi = $OffreEmploi;

        return $this;
    }

    public function getRendezVous(): ?RendezVous
    {
        return $this->Rendez_vous;
    }

    public function setRendezVous(RendezVous $Rendez_vous): self
    {
        $this->Rendez_vous = $Rendez_vous;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }
}
