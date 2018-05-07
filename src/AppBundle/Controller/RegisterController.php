<?php
/**
 * Created by PhpStorm.
 * User: tineo
 * Date: 23/03/17
 * Time: 06:27 PM
 */

namespace AppBundle\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;


class RegisterController extends Controller
{

  /**
   * @Route("/registerw", name="register")
   */
  public function sistarAction(Request $request)
  {


    return $this->render('register/index.html.twig');

  }

    /**
     * @Route("/file/upload", name="upload_media")
     */
    public function uploadAction(Request $request)
    {
        //$request = $this->get('request');
        $files = $request->files;

        // configuration values
        $directory = $this->get('kernel')->getRootDir() . '/../web' . $request->getBasePath() . '/files/';

    // $file will be an instance of Symfony\Component\HttpFoundation\File\UploadedFile
    foreach ($files as $uploadedFile) {
        // name the resulting file
        $name = $uploadedFile->getClientOriginalName();
        $file = $uploadedFile->move($directory, $name);

        // do something with the actual file
        //$this->doSomething($file);
    }

    // return data to the frontend
    return new JsonResponse([]);
}
}