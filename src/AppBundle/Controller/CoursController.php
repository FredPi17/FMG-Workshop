<?php
/**
 * Created by PhpStorm.
 * User: fredericpinaud
 * Date: 26/06/2018
 * Time: 16:32
 */

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class CoursController extends Controller
{
    /**
     * @Route("/cours/show", name="showArticle")
     */
    public function showArticle(){
        return $this->render('cours/show.html.twig');
    }


}