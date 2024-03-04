<?php

namespace App\Controller;

use App\Repository\LivresRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class LivresController extends AbstractController
{
    #[Route('/livres', name: 'admin_livres')]
    public function index(LivresRepository $rep): Response
    {
        $livres = $rep->findAll();
        //dd($livres);
        return $this->render('Livres/index.html.twig', ['livres' => $livres]);
    }
    #[Route('/livres/show/{id}', name: 'admin_livres_show')]
    public function show(LivresRepository $rep, $id): Response
    {
        $livre = $rep->find($id);
        //dd($livre);
        return $this->render('Livres/show.html.twig', ['livre' => $livre]);
    }
}
