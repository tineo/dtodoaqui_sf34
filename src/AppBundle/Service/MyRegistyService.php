<?php
/**
 * Created by PhpStorm.
 * User: tineo
 * Date: 12/01/18
 * Time: 03:06 PM
 */

namespace AppBundle\Service;


use AppBundle\Entity\Bussiness;
use Doctrine\ORM\EntityManager;

class MyRegistyService {

  private $list;
  private $counts = 0;
  protected $em;
  public function __construct(EntityManager $entityManager) {
    $this->em = $entityManager;
    $this->list = $this->getList();
  }

  public function __toString() {
    return $this->counts." favorites";
  }

  public function getList(){
    //Do the Database stuff
    //$query = $this->em->createQueryBuilder();
    $list = $this->em->getRepository(Bussiness::class)->findAll();
    $this->counts = count($list);
    //Your Query goes here
    //$result = $query->getResult();
    return $list;
  }

  /**
   * @return int
   */
  public function getCounts() {
    return $this->counts;
  }
}