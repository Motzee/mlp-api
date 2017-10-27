<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation as Serializer;

/**
 * Pony
 *
 * @ORM\Table(name="pony")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\PonyRepository")
 */
class Pony
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @Serializer\Groups({"listing", "details"})
     */
    private $id;

    /**
     * @var string
     * @ORM\Column(name="name", type="string", length=255)
     * @Serializer\Groups({"listing", "details"})
     */
    private $name;

    /**
     * @var int
     * @ORM\Column(name="family", type="integer", nullable=true)
     * @Serializer\Groups({"details"})
     */
    private $family;

    /**
     * @var string
     * @ORM\Column(name="type", type="string", length=255)
     * @Serializer\Groups({"listing", "details"})
     */
    private $type;

    /**
     * @var string
     * @ORM\Column(name="job", type="string", length=255, nullable=true)
     * @Serializer\Groups({"details"})
     */
    private $job;

    /**
     * @var string
     * @ORM\Column(name="cutiemark", type="string", length=255, nullable=true)
     * @Serializer\Groups({"details"})
     */
    private $cutiemark;

    /**
     * @var string
     * @ORM\Column(name="body", type="string", length=255)
     * @Serializer\Groups({"details"})
     */
    private $body;

    /**
     * @var string
     * @ORM\Column(name="mane", type="string", length=255)
     * @Serializer\Groups({"details"})
     */
    private $mane;

    /**
     * @var string
     * @ORM\Column(name="eyes", type="string", length=255)
     * @Serializer\Groups({"details"})
     */
    private $eyes;

    /**
     * @var bool
     * @ORM\Column(name="antagonist", type="boolean")
     * @Serializer\Groups({"details"})
     */
    private $antagonist;

    /**
     * @var string
     * @ORM\Column(name="other", type="string", length=3000, nullable=true)
     * @Serializer\Groups({"details"})
     */
    private $other;

    /**
     * @var string
     * @ORM\Column(name="imgpony", type="string", length=255, nullable=true)
     * @Serializer\Groups({"listing", "details"})
     */
    private $imgpony;

    /**
     * @var string
     * @ORM\Column(name="imgcutiemark", type="string", length=255, nullable=true)
     * @Serializer\Groups({"details"})
     */
    private $imgcutiemark;


    /**
     * Set id
     *
     * @param string $id
     *
     * @return Pony
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }
    
    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return Pony
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set family
     *
     * @param integer $family
     *
     * @return Pony
     */
    public function setFamily($family)
    {
        $this->family = $family;

        return $this;
    }

    /**
     * Get family
     *
     * @return int
     */
    public function getFamily()
    {
        return $this->family;
    }

    /**
     * Set type
     *
     * @param string $type
     *
     * @return Pony
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set job
     *
     * @param string $job
     *
     * @return Pony
     */
    public function setJob($job)
    {
        $this->job = $job;

        return $this;
    }

    /**
     * Get job
     *
     * @return string
     */
    public function getJob()
    {
        return $this->job;
    }

    /**
     * Set cutiemark
     *
     * @param string $cutiemark
     *
     * @return Pony
     */
    public function setCutiemark($cutiemark)
    {
        $this->cutiemark = $cutiemark;

        return $this;
    }

    /**
     * Get cutiemark
     *
     * @return string
     */
    public function getCutiemark()
    {
        return $this->cutiemark;
    }

    /**
     * Set body
     *
     * @param string $body
     *
     * @return Pony
     */
    public function setBody($body)
    {
        $this->body = $body;

        return $this;
    }

    /**
     * Get body
     *
     * @return string
     */
    public function getBody()
    {
        return $this->body;
    }

    /**
     * Set mane
     *
     * @param string $mane
     *
     * @return Pony
     */
    public function setMane($mane)
    {
        $this->mane = $mane;

        return $this;
    }

    /**
     * Get mane
     *
     * @return string
     */
    public function getMane()
    {
        return $this->mane;
    }

    /**
     * Set eyes
     *
     * @param string $eyes
     *
     * @return Pony
     */
    public function setEyes($eyes)
    {
        $this->eyes = $eyes;

        return $this;
    }

    /**
     * Get eyes
     *
     * @return string
     */
    public function getEyes()
    {
        return $this->eyes;
    }

    /**
     * Set antagonist
     *
     * @param boolean $antagonist
     *
     * @return Pony
     */
    public function setAntagonist($antagonist)
    {
        $this->antagonist = $antagonist ;
        
        return $this;
    }

    /**
     * Get antagonist
     *
     * @return bool
     */
    public function getAntagonist()
    {
        return $this->antagonist;
    }

    /**
     * Set other
     *
     * @param string $other
     *
     * @return Pony
     */
    public function setOther($other)
    {
        $this->other = $other;

        return $this;
    }

    /**
     * Get other
     *
     * @return string
     */
    public function getOther()
    {
        return $this->other;
    }

    /**
     * Set imgpony
     *
     * @param string $imgpony
     *
     * @return Pony
     */
    public function setImgpony($imgpony)
    {
        $this->imgpony = $imgpony;

        return $this;
    }

    /**
     * Get imgpony
     *
     * @return string
     */
    public function getImgpony()
    {
        return $this->imgpony;
    }

    /**
     * Set imgcutiemark
     *
     * @param string $imgcutiemark
     *
     * @return Pony
     */
    public function setImgcutiemark($imgcutiemark)
    {
        $this->imgcutiemark = $imgcutiemark;

        return $this;
    }

    /**
     * Get imgcutiemark
     *
     * @return string
     */
    public function getImgcutiemark()
    {
        return $this->imgcutiemark;
    }
}

