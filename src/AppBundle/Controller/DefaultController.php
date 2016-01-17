<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    /**
     * @Route("/students/detail/{name}", name="homepage")
     */
    public function indexAction($name)
    {
        $student = $this->getDoctrine()->getRepository('AppBundle:Student')->findOneBy(array('path'=>$name));

        return $this->render('AppBundle:default:index.html.twig',array('student'=>$student));
    }
}
