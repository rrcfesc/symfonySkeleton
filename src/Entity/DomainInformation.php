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

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $footerCompanyName = '';

    /**
     * @ORM\Column(type="string", length=2000)
     */
    private $footerAddress = '';

    /**
     * @ORM\OneToMany(targetEntity=DomainPage::class, mappedBy="domainInformation")
     */
    private $domainPages;

    public function __construct()
    {
        $this->domains = new ArrayCollection();
        $this->domainPages = new ArrayCollection();
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

    public function getFooterCompanyName(): ?string
    {
        return $this->footerCompanyName;
    }

    public function setFooterCompanyName(string $footerCompanyName): self
    {
        $this->footerCompanyName = $footerCompanyName;

        return $this;
    }

    public function getFooterAddress(): ?string
    {
        return $this->footerAddress;
    }

    public function setFooterAddress(string $footerAddress): self
    {
        $this->footerAddress = $footerAddress;

        return $this;
    }

    /**
     * @return Collection|DomainPage[]
     */
    public function getDomainPages(): Collection
    {
        return $this->domainPages;
    }

    public function addDomainPage(DomainPage $domainPage): self
    {
        if (!$this->domainPages->contains($domainPage)) {
            $this->domainPages[] = $domainPage;
            $domainPage->setDomainInformation($this);
        }

        return $this;
    }

    public function removeDomainPage(DomainPage $domainPage): self
    {
        if ($this->domainPages->removeElement($domainPage)) {
            // set the owning side to null (unless already changed)
            if ($domainPage->getDomainInformation() === $this) {
                $domainPage->setDomainInformation(null);
            }
        }

        return $this;
    }
}
