<?php
/**
 * Created by PhpStorm.
 * User: tineo
 * Date: 23/03/17
 * Time: 06:52 PM
 */

namespace AppBundle\Controller;


use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;



class ActivityController extends Controller
{

    /**
     * @Route("/activities", name="profile")
     */
    public function sistarAction(Request $request)
    {

        return $this->render('profile/index.html.twig');

    }

}