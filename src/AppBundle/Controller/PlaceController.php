<?php
/**
 * Created by PhpStorm.
 * User: tineo
 * Date: 23/03/17
 * Time: 11:20 PM
 */

namespace AppBundle\Controller;


use AppBundle\Entity\Bussiness;
use AppBundle\Entity\File;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class PlaceController extends Controller
{
  /**
   * @Route("/e/new", name="new_establishment")
   */
  public function placeAction() {

    $em    = $this->getDoctrine()->getManager();
    $place = new Bussiness();
    $place->setAddress("qwewqeqwe");
    $place->setBusinessName("5345435435");
    $place->setLatitude(-12.0341741);
    $place->setLongitude(-77.0794863);
    $place->setLinks(
      json_encode(
        array("facebook" => "https://www.facebook.com/itsudatte")
      )
    );
    $em->persist($place);
    $em->flush();

    return new Response("id:".$place->getId());
  }


  /**
   * @Route("/e/{id}", name="establishment")
   */
  public function sistarAction($id)
  {
    $em = $this->getDoctrine()->getManager();

    $place = $this->getDoctrine()
                  ->getRepository(Bussiness::class)
                  ->find($id);

    if (!$place) {
      throw $this->createNotFoundException(
        'No product found for id '."1"
      );
    }

    return $this->render('place/index.html.twig', array(
      'place' => $place,
    ));

  }

  /**
   * @Route("/upload", name="upload")
   */
  public function uploadAction(Request $request)
  {
    //sleep(10);
    //$data = $this->getRequest()->request->all();

    $em = $this->getDoctrine()->getManager();

    $file = $request->files->get('file');

    //var_dump($data);
    //var_dump($file);
    $fileName = md5(uniqid()).'.'.$file->guessExtension();
    $fileDir = $this->container->getParameter('kernel.root_dir').'/../web/files/';
    $file->move(
      $fileDir,
      $fileName
    );

    $user = $this->container->get('security.token_storage')->getToken()->getUser();
    $place = $this->getDoctrine()
                  ->getRepository(Bussiness::class)
                  ->find(1);
    $f = new File();
    $f->setBussiness($place);
    $f->setUser($user);
    $f->setFilename($fileName);
    $f->setFlag(0);

    $em->persist($f);
    $em->flush();

    return new Response($f->getId());
  }

}