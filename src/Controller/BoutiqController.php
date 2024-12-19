<?php

namespace App\Controller;

use App\Entity\Boutiq;
use App\Form\BoutiqType;
use App\Repository\BoutiqRepository;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class BoutiqController extends AbstractController
{
    #[Route('/boutiq', name: 'app_boutiq')]
    public function index(): Response
    {
        return $this->render('boutiq/index.html.twig', [
            'controller_name' => 'BoutiqController',
        ]);
    }

    #[Route('/boutiq', name: 'app.boutiq.show')]
    public function show( BoutiqRepository $boutiqRepository): Response
    {
        // $boutiq = $boutiqRepository->find($id);

        return $this->render('boutiq/show.html.twig', [
            'controller_name' => 'BoutiqController',
            // 'boutiq' => $boutiq,
        ]);
    }

    #[Route('/boutiq/create', name: 'app.boutiq.create')]
    public function create(Request $request, EntityManagerInterface $em): Response
    {
        $boutiq = new Boutiq();
        $form = $this->createForm(BoutiqType::class, $boutiq);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            
        }

        return $this->render('boutiq/create.html.twig', [
            'controller_name' => 'BoutiqController',
            'form' => $form,
        ]);
    }


}
