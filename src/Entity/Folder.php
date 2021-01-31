<?php

namespace App\Entity;

use App\Repository\FolderRepository;
use Cassandra\Date;
use DateTime;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=FolderRepository::class)
 */
class Folder
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
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $deletedAt;

    /**
     * @ORM\Column(type="datetime")
     */
    private DateTime $created;

    /**
     * @ORM\OneToMany(targetEntity=MediaUploaded::class, mappedBy="folder")
     */
    private $mediaUploadeds;

    public function __construct()
    {
        $this->created = new DateTime();
        $this->mediaUploadeds = new ArrayCollection();
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

    public function getDeletedAt(): ?\DateTimeInterface
    {
        return $this->deletedAt;
    }

    public function setDeletedAt(?\DateTimeInterface $deletedAt): self
    {
        $this->deletedAt = $deletedAt;

        return $this;
    }

    public function getCreated(): ?\DateTimeInterface
    {
        return $this->created;
    }

    public function setCreated(\DateTimeInterface $created): self
    {
        $this->created = $created;

        return $this;
    }

    /**
     * @return Collection|MediaUploaded[]
     */
    public function getMediaUploadeds(): Collection
    {
        return $this->mediaUploadeds;
    }

    public function addMediaUploaded(MediaUploaded $mediaUploaded): self
    {
        if (!$this->mediaUploadeds->contains($mediaUploaded)) {
            $this->mediaUploadeds[] = $mediaUploaded;
            $mediaUploaded->setFolder($this);
        }

        return $this;
    }

    public function removeMediaUploaded(MediaUploaded $mediaUploaded): self
    {
        if ($this->mediaUploadeds->removeElement($mediaUploaded)) {
            // set the owning side to null (unless already changed)
            if ($mediaUploaded->getFolder() === $this) {
                $mediaUploaded->setFolder(null);
            }
        }

        return $this;
    }
}
