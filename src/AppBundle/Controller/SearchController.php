<?php
/**
 * Created by PhpStorm.
 * User: tineo
 * Date: 14/01/18
 * Time: 09:49 PM
 */

namespace AppBundle\Controller;


use AppBundle\Entity\Bussiness;

use AppBundle\Entity\City;
use AppBundle\Entity\Country;
use AppBundle\Entity\District;
use AppBundle\Entity\Keyword;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SearchController extends Controller {
  /**
   * @Route("/results", name="results")
   */
  public function resultsAction(Request $request)
  {
    // replace this example code with whatever you need
    return $this->render('default/results.html.twig');
  }

  /**
   * @Route("/keywords", name="keywords")
   */
  public function keywordsAction(Request $request)
  {

    // replace this example code with whatever you need
    $isAjax = $request->isXmlHttpRequest();
    if(true){

      $em = $this->getDoctrine()->getManager();
$keyword = $em->getRepository(Keyword::class)->findOneBy(array("text" => $request->query->get('q')));

      $data = $em->getRepository(Keyword::class)->findAll();
      $serializer = $this->container->get('jms_serializer');
      $json = $serializer->serialize($data,'json');

      return new JsonResponse((array) json_decode($json));
    }else{
      return new Response(":v", 403);
    }
  }

  /**
   * @Route("/country", name="country")
   */
  public function countryAction(Request $request)
  {
    $em = $this->getDoctrine()->getManager();
    $data = $em->getRepository(Country::class)->findAll();
    $serializer = $this->container->get('jms_serializer');
    $json = $serializer->serialize($data,'json');
    return new Response($json);
  }

  /**
   * @Route("/city", name="city")
   */
  public function cityAction(Request $request)
  {
    $em = $this->getDoctrine()->getManager();
    $data = $em->getRepository(City::class)->findAll();
    $serializer = $this->container->get('jms_serializer');
    $json = $serializer->serialize($data,'json');
    return new Response($json);
  }

  /**
   * @Route("/district", name="district")
   */
  public function districtAction(Request $request)
  {
    $em = $this->getDoctrine()->getManager();
    $data = $em->getRepository(District::class)->findAll();
    $serializer = $this->container->get('jms_serializer');
    $json = $serializer->serialize($data,'json');
    return new Response($json);

  }

  /**
   * @Route("/locations", name="locations")
   */
  public function locationsAction(Request $request)
  {
    $em = $this->getDoctrine()->getManager();
    $data = $em->getRepository(District::class)->findAll();
    $serializer = $this->container->get('jms_serializer');
    $json = $serializer->serialize($data,'json');
    return new Response($json);

  }

}