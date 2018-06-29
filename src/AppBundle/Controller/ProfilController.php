<?php
/**
 * Created by PhpStorm.
 * User: fredericpinaud
 * Date: 26/06/2018
 * Time: 16:34
 */

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class ProfilController extends Controller
{
    /**
     * @Route("/profil", name="profil")
     */
    public function indexAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $categories = $em->getRepository('AppBundle:Category')->findAll();
        // replace this example code with whatever you need
        return $this->render('profil/index.html.twig', [
            'categories' => $categories,
            'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR,
        ]);
    }

    /**
     * @Route("/cgu", name="CGU")
     */
    public function showCGU(){
        return $this->render('conditions/condition.html.twig');
    }


}
