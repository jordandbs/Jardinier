<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\Routing\Attribute\Route;

class DevisController extends AbstractController
{
    #[Route('/devis', name: 'app_devis')]
    public function index(Request $request): Response
    {

        
        $request = Request::createFromGlobals();
        $type = $request->get('type'); 
        
        $session = $request->getSession();
        $session->set('type', $type);

        return $this->render('devis/index.html.twig', [

        ]);
    }
}

