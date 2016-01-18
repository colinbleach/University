<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Cache;

class DefaultController extends Controller
{
    /**
     * @Route("/students/detail/{name}", name="homepage")
     * @Cache(expires="tomorrow", public=true)
     */
    public function indexAction($name)
    {
        $student = $this->getDoctrine()->getRepository('AppBundle:Student')->findOneBy(array('path'=>$name));

        return $this->render('AppBundle:default:index.html.twig',array('student'=>$student));
    }
}
