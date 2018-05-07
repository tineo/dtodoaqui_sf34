<?php
/**
 * Created by PhpStorm.
 * User: tineo
 * Date: 23/03/17
 * Time: 11:20 PM
 */

namespace AppBundle\Controller;


use AppBundle\Entity\Bussiness;
use AppBundle\Entity\User;
use AppBundle\Form\UserEditType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class ProfileController extends Controller
{
  /**
   * @Route("/u/new", name="new_user_demo")
   */
  public function placeAction() {

    $em    = $this->getDoctrine()->getManager();
    $place = new Bussiness();
    $place->setAddress("qwewqeqwe");
    $place->setBusinessName("5345435435");
    $place->setLatitude(-12.0341741);
    $place->setLongitude(-77.0794863);
    $place->setZoom(17);
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
   * @Route("/u/edit", name="profile_user_edit")
   */
  public function editProfileAction(Request $request)
  {

    $form = $this->createForm(UserEditType::class);
    /*$profile = $this->getDoctrine()
                    ->getRepository(User::class)
                    ->find($this->getUser()->getId());


    $form = $this->createFormBuilder($profile)
                 ->getForm();*/
    $form = $this->createFormBuilder(new User())->add('save', SubmitType::class, array('label' => 'Create Task'))->getForm();

    return $this->render('profile/edit.html.twig', array(
      'form' => $form->createView(),
    ));

  }


  /**
   * @Route("/u", name="profile_user_show")
   */
  public function showProfileAction(Request $request)
  {

    return $this->render('profile/index.html.twig');

  }



}