<?php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\Haie; 

class HaieController extends AbstractController
{
    #[Route('/haie', name: 'app_haie')]
    public function index(): Response
    {
        return $this->render('haie/index.html.twig', [
            'controller_name' => 'HaieController',
        ]);
    }

    #[Route('/haie/creer', name: 'app_haie_creer')]
    public function haie_creer(EntityManagerInterface $entityManager): Response
    {
        $haie = new Haie();
        $haie->setCode('H001');
        $haie->setNom('Haie de laurier');
        $haie->setPrix(50.00);

        $entityManager->persist($haie);
        $entityManager->flush();

        return new Response('Haie créée avec succès : ' . $haie->getCode());
    }

    #[Route('/haie/{code}', name: 'app_haie_voir')]
    public function haie_voir(EntityManagerInterface $entityManager, string $code): Response
    {
        $haie = $entityManager->getRepository(Haie::class)->find($code);
        if (!$haie) {
            return new Response('Ce type de haie n\'existe pas : ' . $code);
        } else {
            return new Response('Type de haie : ' . $haie->getNom() . ' à ' . $haie->getPrix() . '€');
        }
    }

}