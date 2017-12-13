<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Dashboard;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class DashboardController
 * @package AppBundle\Controller
 * @Route (dashboard)
 */


class DashboardController extends Controller
{
    /**
     * @Route("/index", name="dashboard_index")
     */
    public function indexAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $fiches = $em->getRepository('AppBundle:Fiche')->findAll();
        $projets = $em->getRepository('AppBundle:Projet')->findAll();
        $managers = $em->getRepository('AppBundle:Manager')->findAll();

        return $this->render('dashboard/index.html.twig', array(
            'fiches' => $fiches,
            'projets' => $projets,
            'managers' => $managers
        ));
    }
}
