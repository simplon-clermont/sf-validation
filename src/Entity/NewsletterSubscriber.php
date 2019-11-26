<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="App\Repository\NewsletterSubscriberRepository")
 * @UniqueEntity("email")
 */
class NewsletterSubscriber
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=191, unique=true)
     * @Assert\Email
     */
    private $email;

    /**
     * @ORM\Column(type="datetime")
     * @Assert\DateTime
     */
    private $subscribeDate;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getSubscribeDate(): ?\DateTimeInterface
    {
        return $this->subscribeDate;
    }

    public function setSubscribeDate(\DateTimeInterface $subscribeDate): self
    {
        $this->subscribeDate = $subscribeDate;

        return $this;
    }
}
