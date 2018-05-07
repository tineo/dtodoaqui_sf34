<?php
/**
 * Created by PhpStorm.
 * User: tineo
 * Date: 23/01/17
 * Time: 02:01 AM
 */

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="BussinessRepository")
 * @ORM\Table(name="bussiness")
 */
class Bussiness
{
  /**
   * @ORM\Column(type="integer")
   * @ORM\Id
   * @ORM\GeneratedValue(strategy="AUTO")
   */
  private $id;

  /**
   * @ORM\Column(type="integer")
   */
  private $id_distro;
  /**
   * @ORM\Column(type="integer")
   */
  private $id_registar;

  /** @ORM\Column(type="string", length=255, nullable=true) */
  private $name;

  /** @ORM\Column(type="string", length=255, nullable=true) */
  private $business_name;

  private $ruc;
  private $legal_representative;

  /** @ORM\Column(type="string", length=255, nullable=true) */
  private $image;

  private $district;
  private $level;

  /** @ORM\Column(type="string", length=255, nullable=true) */
  private $address;

  private $phone;
  private $webpage;
  private $email;
  private $workhour_open;
  private $workhour_close;
  private $price;
  private $description;

  /**
   * @ORM\Column(type="float", scale=7)
   */
  private $latitude;
  /**
   * @ORM\Column(type="float", scale=7)
   */
  private $longitude;
  /**
   * @ORM\Column(type="float", scale=2)
   */
  private $zoom;

  private $state;
  private $visits;
  private $type;
  private $reference_code;


  /**
   * @ORM\Column(type="json_array",)
   */
  private $links;

  private $facebook;
  private $twitter;
  private $google;
  private $skype;

  private $wifi;
  private $creditcard;

  private $keywords;

  /**
   * @return mixed
   */
  public function getId()
  {
    return $this->id;
  }

  /**
   * @param mixed $id
   * @return Bussiness
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
   * @return Bussiness
   */
  public function setName($name)
  {
    $this->name = $name;
    return $this;
  }

  /**
   * @return mixed
   */
  public function getBusinessName()
  {
    return $this->business_name;
  }

  /**
   * @param mixed $business_name
   * @return Bussiness
   */
  public function setBusinessName($business_name)
  {
    $this->business_name = $business_name;
    return $this;
  }

  /**
   * @return mixed
   */
  public function getImage()
  {
    return $this->image;
  }

  /**
   * @param mixed $image
   * @return Bussiness
   */
  public function setImage($image)
  {
    $this->image = $image;
    return $this;
  }

  /**
   * @return mixed
   */
  public function getAddress()
  {
    return $this->address;
  }

  /**
   * @param mixed $address
   * @return Bussiness
   */
  public function setAddress($address)
  {
    $this->address = $address;
    return $this;
  }

  /**
   * @return mixed
   */
  public function getLatitude() {
    return $this->latitude;
  }

  /**
   * @param mixed $latitude
   *
   * @return Bussiness
   */
  public function setLatitude($latitude) {
    $this->latitude = $latitude;
    return $this;
  }

  /**
   * @return mixed
   */
  public function getLongitude() {
    return $this->longitude;
  }

  /**
   * @param mixed $longitude
   *
   * @return Bussiness
   */
  public function setLongitude($longitude) {
    $this->longitude = $longitude;
    return $this;
  }

  /**
   * @return mixed
   */
  public function getLinks() {
    return $this->links;
  }

  /**
   * @param mixed $links
   */
  public function setLinks($links) {
    $this->links = $links;
  }

  /**
   * @return mixed
   */
  public function getZoom() {
    return $this->zoom;
  }

  /**
   * @param mixed $zoom
   *
   * @return Bussiness
   */
  public function setZoom($zoom) {
    $this->zoom = $zoom;
    return $this;
  }

  /**
   * @return mixed
   */
  public function getDistro() {
    return $this->distro;
  }

  /**
   * @return mixed
   */
  public function getIdDistro() {
    return $this->id_distro;
  }

  /**
   * @param mixed $id_distro
   */
  public function setIdDistro($id_distro) {
    $this->id_distro = $id_distro;
  }

  /**
   * @return mixed
   */
  public function getIdRegistar() {
    return $this->id_registar;
  }

  /**
   * @param mixed $id_registar
   */
  public function setIdRegistar($id_registar) {
    $this->id_registar = $id_registar;
  }








}