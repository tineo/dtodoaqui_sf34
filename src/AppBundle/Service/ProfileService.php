<?php
/**
 * Created by PhpStorm.
 * User: tineo
 * Date: 12/01/18
 * Time: 03:06 PM
 */

namespace AppBundle\Service;


use AppBundle\Entity\Bussiness;
use AppBundle\Entity\User;
use Doctrine\ORM\EntityManager;

class ProfileService {

  protected $em;
  public function __construct(EntityManager $entityManager) {
    $this->em = $entityManager;
  }

  public function __toString() {
    return "profile_service";
  }

  public function getByUserId($id){
    //Do the Database stuff
    //$query = $this->em->createQueryBuilder();
    $user = $this->em->getRepository(User::class)->find($id);
    //Your Query goes here
    //$result = $query->getResult();
    return $user;
  }

}