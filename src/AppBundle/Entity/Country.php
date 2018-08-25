<?php
/**
 * Created by PhpStorm.
 * User: tineo
 * Date: 23/01/17
 * Time: 12:38 AM
 */

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;


/**
 * @ORM\Entity(repositoryClass="CountryRepository")
 * @ORM\Table(name="country")
 */
class Country
{

    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $abrv;

    /**
     * @ORM\Column(type="integer")
     */
    private $state;

    /**
     * One Country has Many cities.
     * @ORM\OneToMany(targetEntity="City", mappedBy="country")
     */
    private $cities;

    /**
     * Country constructor.
     */
    public function __construct()
    {
        $this->state = 0;
    }

    public function __toString()
    {
        // TODO: Implement __toString() method.
        return $this->getName();
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     * @return Country
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     * @return Country
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getAbrv()
    {
        return $this->abrv;
    }

    /**
     * @param mixed $abrv
     * @return Country
     */
    public function setAbrv($abrv)
    {
        $this->abrv = $abrv;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getState()
    {
        return $this->state;
    }

    /**
     * @param mixed $state
     * @return Country
     */
    public function setState($state)
    {
        $this->state = $state;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getCities()
    {
        return $this->cities;
    }

    /**
     * @param mixed $cities
     * @return Country
     */
    public function setCities($cities)
    {
        $this->cities = $cities;
        return $this;
    }


    /**
     * Add city.
     *
     * @param \AppBundle\Entity\City $city
     *
     * @return Country
     */
    public function addCity(\AppBundle\Entity\City $city)
    {
        $this->cities[] = $city;

        return $this;
    }

    /**
     * Remove city.
     *
     * @param \AppBundle\Entity\City $city
     *
     * @return boolean TRUE if this collection contained the specified element, FALSE otherwise.
     */
    public function removeCity(\AppBundle\Entity\City $city)
    {
        return $this->cities->removeElement($city);
    }
}
