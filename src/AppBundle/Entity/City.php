<?php
/**
 * Created by PhpStorm.
 * User: tineo
 * Date: 23/01/17
 * Time: 12:45 AM
 */

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="CityRepository")
 * @ORM\Table(name="city")
 */
class City
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
     * @ORM\Column(type="integer")
     */
    private $state;



    /**
     * Many cities have One country.
     * @ORM\ManyToOne(targetEntity="Country", inversedBy="cities")
     * @ORM\JoinColumn(name="idcountry", referencedColumnName="id")
     */
    private $country;

    /**
     * One city has Many districts.
     * @ORM\OneToMany(targetEntity="District", mappedBy="city")
     */
    private $districts;

    /**
     * City constructor.
     */
    public function __construct()
    {
        $this->state = 0;
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
     * @return City
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * @param mixed $country
     * @return City
     */
    public function setCountry($country)
    {
        $this->country = $country;
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
     * @return City
     */
    public function setName($name)
    {
        $this->name = $name;
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
     * @return City
     */
    public function setState($state)
    {
        $this->state = $state;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getDistricts()
    {
        return $this->districts;
    }

    /**
     * @param mixed $districts
     * @return City
     */
    public function setDistricts($districts)
    {
        $this->districts = $districts;
        return $this;
    }





    /**
     * Add district.
     *
     * @param \AppBundle\Entity\District $district
     *
     * @return City
     */
    public function addDistrict(\AppBundle\Entity\District $district)
    {
        $this->districts[] = $district;

        return $this;
    }

    /**
     * Remove district.
     *
     * @param \AppBundle\Entity\District $district
     *
     * @return boolean TRUE if this collection contained the specified element, FALSE otherwise.
     */
    public function removeDistrict(\AppBundle\Entity\District $district)
    {
        return $this->districts->removeElement($district);
    }
}
