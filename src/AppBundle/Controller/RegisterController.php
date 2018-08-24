<?php
/**
 * Created by PhpStorm.
 * User: tineo
 * Date: 23/03/17
 * Time: 06:27 PM
 */

namespace AppBundle\Controller;
use AppBundle\Entity\Category;
use AppBundle\Entity\Country;
use AppBundle\Entity\Subcategory;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\Form\Form;
use Symfony\Component\Form\Forms;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;


class RegisterController extends Controller
{

  /**
   * @Route("/newplace", name="register")
   */
  public function sistarAction(Request $request)
  {

      $repoCategory = $this->getDoctrine()->getRepository(Category::class);
      $repoSubcategory = $this->getDoctrine()->getRepository(Subcategory::class);

      $categories = $repoCategory->findAll();
      $subcategories = $repoSubcategory->findAll();

      $formFactory = Forms::createFormFactory();
      $form = $formFactory->create();

      if ($form->isSubmitted() /*&& $form->isValid()*/) {
          // $form->getData() holds the submitted values
          // but, the original `$task` variable has also been updated
          $task = $form->getData();

          // ... perform some action, such as saving the task to the database
          // for example, if Task is a Doctrine entity, save it!
          // $entityManager = $this->getDoctrine()->getManager();
          // $entityManager->persist($task);
          // $entityManager->flush();

          return $this->redirectToRoute('task_success');
      }


      return $this->render('register/index.html.twig', array(
          'categories' => $categories,
          'subcategories' => $subcategories
      ));

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

    /**
     * @Route("/ajax/countries", name="get_countries")
     */
    public function showCountries(Request $request)
    {
        //$serializedEntity = $this->container->get('serializer')->serialize($entity, 'json');
        //return new Response($serializedEntity);
        if(!empty($request->query->get('term'))){
            $em = $this->getDoctrine()->getManager();
            $countries = $em->createQuery('select m from AppBundle\Entity\Country m WHERE m.name LIKE ?1')
                ->setParameter(1, '%'.$request->query->get('term').'%')
                ->getResult(\Doctrine\ORM\Query::HYDRATE_ARRAY);
            $serializedEntity = $this->container->get('serializer')->serialize($countries, 'json');
            return new Response($serializedEntity);
        }
        //$repoCountry = $this->getDoctrine()->getRepository(Country::class);
        //$countries = $repoCountry->findAll();
        $em = $this->getDoctrine()->getManager();
        $countries = $em->createQuery('select m from AppBundle\Entity\Country m')
            ->getResult(\Doctrine\ORM\Query::HYDRATE_ARRAY);
        $serializedEntity = $this->container->get('serializer')->serialize($countries, 'json');
        return new Response($serializedEntity);
    }

    /**
     * @Route("/ajax/cities", name="get_cities")
     */
    public function showCities(Request $request)
    {

        $em = $this->getDoctrine()->getManager();
        $cities = $em
            ->createQuery('select m from AppBundle\Entity\City m JOIN m.country c WHERE c.id = ?1')
            ->setParameter(1, $request->query->get('c'))
            ->getResult(\Doctrine\ORM\Query::HYDRATE_ARRAY);
        $serializedEntity = $this->container
            ->get('serializer')
            ->serialize($cities, 'json');
        return new Response($serializedEntity);
    }

    /**
     * @Route("/ajax/districts", name="get_districts")
     */
    public function showDistricts(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $cities = $em
            ->createQuery('select m from AppBundle\Entity\District m JOIN m.city c WHERE c.id = ?1')
            ->setParameter(1, $request->query->get('c'))
            ->getResult(\Doctrine\ORM\Query::HYDRATE_ARRAY);
        $serializedEntity = $this->container
            ->get('serializer')
            ->serialize($cities, 'json');
        return new Response($serializedEntity);
    }

    /**
     * @Route("/createplace", name="create_place")
     */
    public function createPlaceAction(Request $request)
    {

    }

}