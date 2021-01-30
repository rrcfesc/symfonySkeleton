<?php

namespace App\Entity;

use App\Repository\DomainInformationRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=DomainInformationRepository::class)
 */
class DomainInformation
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $logo;

    /**
     * @ORM\OneToMany(targetEntity=Domain::class, mappedBy="domainInformation")
     */
    private $domains;

    /**
     * @ORM\Column(type="string", length=7)
     */
    private string $headerBackgroundColor = '#000000';

    /**
     * @ORM\Column(type="string", length=7)
     */
    private string $headerTextColor = '#000';

    /**
     * @ORM\Column(type="integer")
     */
    private int $logoWidth = 133;

    public function __construct()
    {
        $this->domains = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLogo(): ?string
    {
        return $this->logo;
    }

    public function setLogo(?string $logo): self
    {
        $this->logo = $logo;

        return $this;
    }

    /**
     * @return Collection|Domain[]
     */
    public function getDomains(): Collection
    {
        return $this->domains;
    }

    public function addDomain(Domain $domain): self
    {
        if (!$this->domains->contains($domain)) {
            $this->domains[] = $domain;
            $domain->setDomainInformation($this);
        }

        return $this;
    }

    public function removeDomain(Domain $domain): self
    {
        if ($this->domains->removeElement($domain)) {
            // set the owning side to null (unless already changed)
            if ($domain->getDomainInformation() === $this) {
                $domain->setDomainInformation(null);
            }
        }

        return $this;
    }

    public function getHeaderBackgroundColor(): ?string
    {
        return $this->headerBackgroundColor;
    }

    public function setHeaderBackgroundColor(string $headerBackgroundColor): self
    {
        $this->headerBackgroundColor = $headerBackgroundColor;

        return $this;
    }

    public function getHeaderTextColor(): ?string
    {
        return $this->headerTextColor;
    }

    public function setHeaderTextColor(string $headerTextColor): self
    {
        $this->headerTextColor = $headerTextColor;

        return $this;
    }

    public function getLogoWidth(): ?string
    {
        return $this->logoWidth;
    }

    public function setLogoWidth(string $logoWidth): self
    {
        $this->logoWidth = $logoWidth;

        return $this;
    }
}
