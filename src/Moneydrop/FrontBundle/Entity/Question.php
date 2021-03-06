<?php

namespace Moneydrop\FrontBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Question
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Moneydrop\FrontBundle\Entity\QuestionRepository")
 */
class Question
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var integer
     *
     * @ORM\Column(name="level", type="integer")
     */
    private $level;

    /**
     * @ORM\ManyToOne(targetEntity="Theme", inversedBy="questions")
     * @ORM\JoinColumn(name="theme_id", referencedColumnName="id")
     */
    private $theme;

    /**
     * @ORM\OneToMany(targetEntity="Response", mappedBy="question")
     */
    private $responses;

    public function __construct()
    {
        $this->rsponses = new ArrayCollection();
    }

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return Question
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
     * Set level
     *
     * @param integer $level
     * @return Question
     */
    public function setLevel($level)
    {
        $this->level = $level;

        return $this;
    }

    /**
     * Get level
     *
     * @return integer 
     */
    public function getLevel()
    {
        return $this->level;
    }

    /**
     * Set theme
     *
     * @param \Moneydrop\FrontBundle\Entity\Theme $theme
     * @return Question
     */
    public function setTheme($theme)
    {
        $this->theme = $theme;
    }

    /**
     * Get theme
     *
     * @return \Moneydrop\FrontBundle\Entity\Theme 
     */
    public function getTheme()
    {
        return $this->theme;
    }

    /**
     * Add responses
     *
     * @param \Moneydrop\FrontBundle\Entity\Response $responses
     * @return Question
     */
    public function addResponse(\Moneydrop\FrontBundle\Entity\Response $responses)
    {
        $this->responses[] = $responses;

        return $this;
    }

    /**
     * Remove responses
     *
     * @param \Moneydrop\FrontBundle\Entity\Response $responses
     */
    public function removeResponse(\Moneydrop\FrontBundle\Entity\Response $responses)
    {
        $this->responses->removeElement($responses);
    }

    /**
     * Get responses
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getResponses()
    {
        return $this->responses;
    }
}
