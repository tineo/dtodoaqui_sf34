<?php
/**
 * Created by PhpStorm.
 * User: tineo
 * Date: 12/01/18
 * Time: 03:06 PM
 */

namespace AppBundle\Service;



use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Tools\Pagination\Paginator;
class MyFavoritesService {

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



    $dql = 'SELECT b FROM AppBundle:Bussiness b';
    $query = $this->em->createQuery($dql)
                           ->setFirstResult(0)
                           ->setMaxResults(3);

    $list = new Paginator($query, $fetchJoinCollection = true);


    //Do the Database stuff
    //$query = $this->em->createQueryBuilder();
    //$list = $this->em->getRepository(Bussiness::class)->findAll();
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