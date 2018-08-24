<?php
/**
 * Created by PhpStorm.
 * User: tineo
 * Date: 20/01/18
 * Time: 07:54 PM
 */

namespace AppBundle\Entity;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="FriendsRepository")
 * @ORM\Table(name="friend")
 */
class Friends
{

  const STATUS_PENDING = 0;
  const STATUS_ARE = 1;

  /**
   * @ORM\Id
   * @ORM\Column(type="integer")
   * @ORM\GeneratedValue(strategy="AUTO")
   * @var integer $id
   */
  protected $id;


  /**
   * @ORM\Column(type="integer")
   * @var integer $id
   */
  protected $user_id;

  /**
   * @ORM\Column(type="integer")
   * @var integer $id
   */
  protected $friend_user_id;


  /** @ORM\Column(type="integer", nullable=true) */
  protected $status;

  public function __construct() {
    $this->status = self::STATUS_PENDING;
  }

  /**
   * @return int
   */
  public function getId() {
    return $this->id;
  }

  /**
   * @param int $id
   *
   * @return Friends
   */
  public function setId($id) {
    $this->id = $id;
    return $this;
  }

  /**
   * @return int
   */
  public function getUserId() {
    return $this->user_id;
  }

  /**
   * @param int $user_id
   *
   * @return Friends
   */
  public function setUserId($user_id) {
    $this->user_id = $user_id;
    return $this;
  }

  /**
   * @return int
   */
  public function getFriendUserId() {
    return $this->friend_user_id;
  }

  /**
   * @param int $friend_user_id
   *
   * @return Friends
   */
  public function setFriendUserId($friend_user_id) {
    $this->friend_user_id = $friend_user_id;
    return $this;
  }

  /**
   * @return mixed
   */
  public function getStatus() {
    return $this->status;
  }

  /**
   * @param mixed $status
   *
   * @return Friends
   */
  public function setStatus($status) {
    $this->status = $status;
    return $this;
  }





}
