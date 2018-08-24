<?php
/**
 * Created by PhpStorm.
 * User: tineo
 * Date: 15/01/18
 * Time: 10:46 PM
 */

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation\Type;

/**
 * @ORM\Entity(repositoryClass="KeywordRepository")
 * @ORM\Table(name="keyword")
 */
class Keyword {
  /**
   * @ORM\Column(type="integer")
   * @ORM\Id
   * @ORM\GeneratedValue(strategy="AUTO")
   */
  private $id;

  /**
   * @ORM\Column(type="string")
   */
  private $text;

  /**
   * @ORM\Column(type="integer")
   */
  private $count;

  /**
   * @return mixed
   */
  public function getId() {
    return $this->id;
  }

  /**
   * @param mixed $id
   *
   * @return Keyword
   */
  public function setId($id) {
    $this->id = $id;
    return $this;
  }

  /**
   * @return mixed
   */
  public function getText() {
    return $this->text;
  }

  /**
   * @param mixed $text
   *
   * @return Keyword
   */
  public function setText($text) {
    $this->text = $text;
    return $this;
  }

  /**
   * @return mixed
   */
  public function getCount() {
    return $this->count;
  }

  /**
   * @param mixed $count
   *
   * @return Keyword
   */
  public function setCount($count) {
    $this->count = $count;
    return $this;
  }


  public function increment() {
    $this->count = $this->count++;
    return $this;
  }


}
