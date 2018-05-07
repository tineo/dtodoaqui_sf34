<?php
/**
 * Created by PhpStorm.
 * User: tineo
 * Date: 23/01/17
 * Time: 12:57 AM
 */

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="district")
 */
class District
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
     * @ORM\Column(type="string", length=25)
     */
    private $lat_lng;

    /**
     * @ORM\Column(type="integer")
     */
    private $zoom;

    /**
     * @ORM\Column(type="integer")
     */
    private $state;

    /**
     * Many districts have One city.
     * @ORM\ManyToOne(targetEntity="City", inversedBy="districts")
     * @ORM\JoinColumn(name="idcity", referencedColumnName="id")
     */
    private $city;

    /**
     * District constructor.
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
     * @return District
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
     * @return District
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getLatLng()
    {
        return $this->lat_lng;
    }

    /**
     * @param mixed $lat_lng
     * @return District
     */
    public function setLatLng($lat_lng)
    {
        $this->lat_lng = $lat_lng;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getZoom()
    {
        return $this->zoom;
    }

    /**
     * @param mixed $zoom
     * @return District
     */
    public function setZoom($zoom)
    {
        $this->zoom = $zoom;
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
     * @return District
     */
    public function setState($state)
    {
        $this->state = $state;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * @param mixed $city
     * @return District
     */
    public function setCity($city)
    {
        $this->city = $city;
        return $this;
    }




}