<?php
/**
 * Created by PhpStorm.
 * User: tineo
 * Date: 23/01/17
 * Time: 02:11 AM
 */


namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;

use Symfony\Component\Validator\Constraints as Assert;
/**
 * @ORM\Entity(repositoryClass="UserRepository")
 * @ORM\Table(name="user")
 */
class User extends BaseUser
{

  /**
   * @ORM\Id
   * @ORM\Column(type="integer")
   * @ORM\GeneratedValue(strategy="AUTO")
   *
   */
  protected $id;
  /**
   * @ORM\Column(type="string", length=255)
   *
   * @Assert\NotBlank(message="Please enter your name.", groups={"Registration", "Profile"})
   * @Assert\Length(
   *     min=3,
   *     max=255,
   *     minMessage="The name is too short.",
   *     maxMessage="The name is too long.",
   *     groups={"Registration", "Profile"}
   * )
   */
  protected $firstname;
  /**
   * @ORM\Column(type="string", length=255)
   *
   * @Assert\NotBlank(message="Please enter your name.", groups={"Registration", "Profile"})
   * @Assert\Length(
   *     min=3,
   *     max=255,
   *     minMessage="The name is too short.",
   *     maxMessage="The name is too long.",
   *     groups={"Registration", "Profile"}
   * )
   */
  protected $lastname;


  protected $username;
  protected $usernameCanonical;

  protected $quote;

  /** @ORM\Column(type="smallint", nullable=true) */
  protected $gender;

  /** @ORM\Column(type="date", nullable=true) */
  protected $birthday;

  /** @ORM\Column(type="smallint", nullable=true) */
  protected $civil_status;

  protected $phone;

  /** @ORM\Column(type="integer", nullable=true) */
  protected $location;

  /** @ORM\Column(type="integer", nullable=true) */
  protected $language;

  /** @ORM\Column(type="string", length=255, nullable=true) */
  protected $image;

  protected $facebook;
  protected $description;

  /** @ORM\Column(type="datetime", nullable=true) */
  protected $created_at;

  protected $visits;
  protected $state;

  //protected $code;
  //protected $verification;
  /** @ORM\Column(type="datetime", nullable=true) */
  protected $modificated_at;

  /** @ORM\Column(name="facebook_id", type="string", length=255, nullable=true) */
  protected $facebook_id;
  /** @ORM\Column(name="facebook_access_token", type="string", length=255, nullable=true) */
  protected $facebook_access_token;
  /** @ORM\Column(name="google_id", type="string", length=255, nullable=true) */
  protected $google_id;
  /** @ORM\Column(name="google_access_token", type="string", length=255, nullable=true) */
  protected $google_access_token;


  public function __construct()
  {
    parent::__construct();
    $this->username = "_init_";
    $this->firstname = "";
    $this->lastname = "";
    // your own logic
    $this->created_at = new \DateTime("now");

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
   * @return User
   */
  public function setId($id)
  {
    $this->id = $id;
    return $this;
  }

  /**
   * @return mixed
   */
  public function getFirstname()
  {
    return $this->firstname;
  }

  /**
   * @param mixed $firstname
   * @return User
   */
  public function setFirstname($firstname)
  {
    $this->firstname = $firstname;
    return $this;
  }

  /**
   * @return mixed
   */
  public function getAlias()
  {
    return $this->alias;
  }

  /**
   * @param mixed $alias
   * @return User
   */
  public function setAlias($alias)
  {
    $this->alias = $alias;
    return $this;
  }

  /**
   * @return mixed
   */
  public function getEmail()
  {
    return $this->email;
  }

  /**
   * @param mixed $email
   * @return User
   */
  public function setEmail($email){
    parent::setEmail($email);
    parent::setUsername($email);

    return $this;
  }

  /**
   * @return mixed
   */
  public function getAlternativeEmail()
  {
    return $this->alternative_email;
  }

  /**
   * @param mixed $alternative_email
   * @return User
   */
  public function setAlternativeEmail($alternative_email)
  {
    $this->alternative_email = $alternative_email;
    return $this;
  }

  /**
   * @return mixed
   */
  public function getGender()
  {
    return $this->gender;
  }

  /**
   * @param mixed $gender
   * @return User
   */
  public function setGender($gender)
  {
    $this->gender = $gender;
    return $this;
  }

  /**
   * @return mixed
   */
  public function getBirthday()
  {
    return $this->birthday;
  }

  /**
   * @param mixed $birthday
   * @return User
   */
  public function setBirthday($birthday)
  {
    $this->birthday = $birthday;
    return $this;
  }

  /**
   * @return mixed
   */
  public function getCivilStatus()
  {
    return $this->civil_status;
  }

  /**
   * @param mixed $civil_status
   * @return User
   */
  public function setCivilStatus($civil_status)
  {
    $this->civil_status = $civil_status;
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
   * @return User
   */
  public function setImage($image)
  {
    $this->image = $image;
    return $this;
  }

  /**
   * @return mixed
   */
  public function getFacebook()
  {
    return $this->facebook;
  }

  /**
   * @param mixed $facebook
   * @return User
   */
  public function setFacebook($facebook)
  {
    $this->facebook = $facebook;
    return $this;
  }

  /**
   * @return mixed
   */
  public function getCode()
  {
    return $this->code;
  }

  /**
   * @param mixed $code
   * @return User
   */
  public function setCode($code)
  {
    $this->code = $code;
    return $this;
  }

  /**
   * @return string
   */
  public function getConfirmationToken()
  {
    return $this->confirmationToken;
  }

  /**
   * @param string $confirmationToken
   * @return User
   */
  public function setConfirmationToken($confirmationToken)
  {
    $this->confirmationToken = $confirmationToken;
    return $this;
  }

  /**
   * @return mixed
   */
  public function getDescription()
  {
    return $this->description;
  }

  /**
   * @param mixed $description
   * @return User
   */
  public function setDescription($description)
  {
    $this->description = $description;
    return $this;
  }

  /**
   * @return mixed
   */
  public function getCreatedAt()
  {
    return $this->created_at;
  }

  /**
   * @param mixed $created_at
   * @return User
   */
  public function setCreatedAt($created_at)
  {
    $this->created_at = $created_at;
    return $this;
  }

  /**
   * @return string
   */
  public function getEmailCanonical()
  {
    return $this->emailCanonical;
  }

  /**
   * @param string $emailCanonical
   * @return User
   */
  public function setEmailCanonical($emailCanonical)
  {
    parent::setEmailCanonical($emailCanonical);
    parent::setUsernameCanonical($emailCanonical);
    return $this;
  }

  /**
   * @return bool
   */
  public function isEnabled()
  {
    return $this->enabled;
  }

  /**
   * @param bool $enabled
   * @return User
   */
  public function setEnabled($enabled)
  {
    $this->enabled = $enabled;
    return $this;
  }

  /**
   * @return Collection
   */
  public function getGroups()
  {
    return $this->groups;
  }

  /**
   * @param Collection $groups
   * @return User
   */
  public function setGroups($groups)
  {
    $this->groups = $groups;
    return $this;
  }

  /**
   * @return mixed
   */
  public function getLanguage()
  {
    return $this->language;
  }

  /**
   * @param mixed $language
   * @return User
   */
  public function setLanguage($language)
  {
    $this->language = $language;
    return $this;
  }

  /**
   * @return \DateTime
   */
  public function getLastLogin()
  {
    return $this->lastLogin;
  }


  /**
   * @return mixed
   */
  public function getLastname()
  {
    return $this->lastname;
  }

  /**
   * @param mixed $lastname
   * @return User
   */
  public function setLastname($lastname)
  {
    $this->lastname = $lastname;
    return $this;
  }

  /**
   * @return mixed
   */
  public function getQuote()
  {
    return $this->quote;
  }

  /**
   * @param mixed $quote
   * @return User
   */
  public function setQuote($quote)
  {
    $this->quote = $quote;
    return $this;
  }

  /**
   * @return mixed
   */
  public function getPassword()
  {
    return $this->password;
  }

  /**
   * @param mixed $password
   * @return User
   */
  public function setPassword($password)
  {
    $this->password = $password;
    return $this;
  }

  /**
   * @return mixed
   */
  public function getPhone()
  {
    return $this->phone;
  }

  /**
   * @param mixed $phone
   * @return User
   */
  public function setPhone($phone)
  {
    $this->phone = $phone;
    return $this;
  }

  /**
   * @return mixed
   */
  public function getLocation()
  {
    return $this->location;
  }

  /**
   * @param mixed $location
   * @return User
   */
  public function setLocation($location)
  {
    $this->location = $location;
    return $this;
  }

  /**
   * @return mixed
   */
  public function getVisits()
  {
    return $this->visits;
  }

  /**
   * @param mixed $visits
   * @return User
   */
  public function setVisits($visits)
  {
    $this->visits = $visits;
    return $this;
  }

  /**
   * @return mixed
   */
  public function getVerification()
  {
    return $this->verification;
  }

  /**
   * @param mixed $verification
   * @return User
   */
  public function setVerification($verification)
  {
    $this->verification = $verification;
    return $this;
  }

  /**
   * @return mixed
   */
  public function getModificatedAt()
  {
    return $this->modificated_at;
  }

  /**
   * @param mixed $modificated_at
   * @return User
   */
  public function setModificatedAt($modificated_at)
  {
    $this->modificated_at = $modificated_at;
    return $this;
  }

  /**
   * @return string
   */
  public function getUsername()
  {
    return $this->username;
  }

  /**
   * @param string $username
   * @return User
   */
  public function setUsername($username)
  {
    $this->username = $username;
    return $this;
  }

  /**
   * @return string
   */
  public function getUsernameCanonical()
  {
    return $this->usernameCanonical;
  }

  /**
   * @param string $usernameCanonical
   * @return User
   */
  public function setUsernameCanonical($usernameCanonical)
  {
    $this->usernameCanonical = $usernameCanonical;
    return $this;
  }

  /**
   * @return string
   */
  public function getSalt()
  {
    return $this->salt;
  }

  /**
   * @param string $salt
   * @return User
   */
  public function setSalt($salt)
  {
    $this->salt = $salt;
    return $this;
  }

  /**
   * @return string
   */
  public function getPlainPassword()
  {
    return $this->plainPassword;
  }

  /**
   * @param string $plainPassword
   * @return User
   */
  public function setPlainPassword($plainPassword)
  {
    $this->plainPassword = $plainPassword;
    return $this;
  }

  /**
   * @return \DateTime
   */
  public function getPasswordRequestedAt()
  {
    return $this->passwordRequestedAt;
  }



  /**
   * @return array
   */
  public function getRoles()
  {
    return $this->roles;
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
   * @return User
   */
  public function setState($state)
  {
    $this->state = $state;
    return $this;
  }

  /**
   * @return mixed
   */
  public function getFacebookId()
  {
    return $this->facebook_id;
  }

  /**
   * @param mixed $facebook_id
   * @return User
   */
  public function setFacebookId($facebook_id)
  {
    $this->facebook_id = $facebook_id;
    return $this;
  }

  /**
   * @return mixed
   */
  public function getFacebookAccessToken()
  {
    return $this->facebook_access_token;
  }

  /**
   * @param mixed $facebook_access_token
   * @return User
   */
  public function setFacebookAccessToken($facebook_access_token)
  {
    $this->facebook_access_token = $facebook_access_token;
    return $this;
  }

  /**
   * @return mixed
   */
  public function getGoogleId()
  {
    return $this->google_id;
  }

  /**
   * @param mixed $google_id
   * @return User
   */
  public function setGoogleId($google_id)
  {
    $this->google_id = $google_id;
    return $this;
  }

  /**
   * @return mixed
   */
  public function getGoogleAccessToken()
  {
    return $this->google_access_token;
  }

  /**
   * @param mixed $google_access_token
   * @return User
   */
  public function setGoogleAccessToken($google_access_token)
  {
    $this->google_access_token = $google_access_token;
    return $this;
  }


}