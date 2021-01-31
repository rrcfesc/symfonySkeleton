<?php

namespace App\Entity;

use App\InterfacesFilter\DeletedAtFilter;
use App\Repository\DomainPageRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=DomainPageRepository::class)
 */
class DomainPage implements DeletedAtFilter
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
    private $name;

    /**
     * @ORM\ManyToOne(targetEntity=DomainInformation::class, inversedBy="domainPages")
     * @ORM\JoinColumn(nullable=false)
     */
    private $domainInformation;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $deletedAt;

    /**
     * @ORM\OneToMany(targetEntity=WidgetPage::class, mappedBy="page")
     */
    private $widgetPages;

    public function __construct()
    {
        $this->widgetPages = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

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

    public function getDeletedAt(): ?\DateTimeInterface
    {
        return $this->deletedAt;
    }

    public function setDeletedAt(?\DateTimeInterface $deletedAt): self
    {
        $this->deletedAt = $deletedAt;

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public static function getDeletedAtFilter()
    {
        return 'deletedAt';
    }

    /**
     * @return Collection|WidgetPage[]
     */
    public function getWidgetPages(): Collection
    {
        return $this->widgetPages;
    }

    public function addWidgetPage(WidgetPage $widgetPage): self
    {
        if (!$this->widgetPages->contains($widgetPage)) {
            $this->widgetPages[] = $widgetPage;
            $widgetPage->setPage($this);
        }

        return $this;
    }

    public function removeWidgetPage(WidgetPage $widgetPage): self
    {
        if ($this->widgetPages->removeElement($widgetPage)) {
            // set the owning side to null (unless already changed)
            if ($widgetPage->getPage() === $this) {
                $widgetPage->setPage(null);
            }
        }

        return $this;
    }
}
