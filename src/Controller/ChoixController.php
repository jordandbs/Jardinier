<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class ChoixController extends AbstractController
{
    #[Route('/choix', name: 'app_choix')]
    public function index(Request $request): Response
    {
        return $this->render('choix/index.html.twig', [
        'controller_name' => 'ChoixController',
        
]);
}
}