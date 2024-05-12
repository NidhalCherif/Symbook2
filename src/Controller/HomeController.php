<?php

namespace App\Controller;

use App\Repository\CategoriesRepository;
use App\Repository\LivresRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(LivresRepository $rep,CategoriesRepository $rep1): Response
    {
        // show the last 8 new books
        $livres = $rep->findBy([], ['editedAt' => 'DESC'], 8);
        $categories = $rep1->findAll();
        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
            'livres' => $livres,
            'categories' => $categories
        ]);
    }
    // tous les livres
    #[Route('/livres', name: 'app_livres')]
    public function livres(LivresRepository $rep): Response
    {
        $livres = $rep->findAll();
        return $this->render('livres/listLivres.html.twig', [
            'livres' => $livres
        ]);
    }
}
