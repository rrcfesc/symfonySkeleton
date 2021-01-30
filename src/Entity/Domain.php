<?php

namespace App\Entity;

use App\Repository\DomainRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=DomainRepository::class)
 */
class Domain
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $domainName;

    /**
     * @ORM\ManyToOne(targetEntity=DomainInformation::class, inversedBy="domains", fetch="EAGER")
     * @ORM\JoinColumn(nullable=false)
     */
    private $domainInformation;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $websiteName = '';

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDomainName(): ?string
    {
        return $this->domainName;
    }

    public function setDomainName(string $domainName): self
    {
        $this->domainName = $domainName;

        return $this;
    }

    public function getDomainInformation(): ?DomainInformation
    {
        return $this->domainInformation;
    }

    public function setDomainInformation(?DomainInformation $domainInformation): self
    {
        $this->domainInformation = $domainInformation;

        return $this;
    }

    public function getWebsiteName(): ?string
    {
        return $this->websiteName;
    }

    public function setWebsiteName(string $websiteName): self
    {
        $this->websiteName = $websiteName;

        return $this;
    }
}
