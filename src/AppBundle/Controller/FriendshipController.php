<?php
/**
 * Created by PhpStorm.
 * User: tineo
 * Date: 21/01/18
 * Time: 02:36 AM
 */

namespace AppBundle\Controller;


use AppBundle\Entity\Friends;
use AppBundle\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class FriendshipController extends Controller {
  /**
   * @Route("/addfriends", name="addfriends")
   */
  public function addFriendsAction(Request $request)
  {

    $em = $this->getDoctrine()->getManager();
    $u1 = $em->getRepository(User::class)->find(56);
    $u2 = $em->getRepository(User::class)->find(57);

    $new_fds = $em->getRepository(Friends::class)->addNewFriend($u1, $u2);

    if($new_fds){
      $em->persist($new_fds);
      $em->flush();
    }
    $serializer = $this->container->get('jms_serializer');
    $json = $serializer->serialize($u2,'json');

    // replace this example code with whatever you need
    //return $this->render('default/userguide.html.twig');
    return new Response($json);
  }

  /**
   * @Route("/getfriends", name="getfriends")
   */
  public function getFriendsAction(Request $request)
  {
    $em = $this->getDoctrine()->getManager();
    $fds = $em->getRepository(User::class)->getFriendsById(57);
    $serializer = $this->container->get('jms_serializer');
    $json = $serializer->serialize($fds,'json');
    return new Response($json);
  }
  /**
   * @Route("/confirmfriends", name="confirmfriends")
   */
  public function confirmFriendsAction(Request $request)
  {
    $em = $this->getDoctrine()->getManager();
    $fds = $em->getRepository(Friends::class)->confirmFriendshipByIds(546, 57);

    $serializer = $this->container->get('jms_serializer');
    $json = $serializer->serialize($fds,'json');
    return new Response($json);
  }
}