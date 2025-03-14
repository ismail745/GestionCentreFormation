<?php

namespace App\Controller;

use App\Repository\SessionRepository;
use Doctrine\Persistence\ManagerRegistry;
use App\Entity\Formation;
use App\Entity\Intern;
use App\Entity\Module;
use App\Entity\Category;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    // <-------- Affiche les différents tableaux de sessions dans la page d'accueil -------->

    /**
     * @Route("/profile/home", name="app_home")
     */
    public function index(SessionRepository $session, ManagerRegistry $doctrine): Response
    {
        $nextSessions = $session->findNextSessions();
        
        $currentSessions = $session->findCurrentSessions();

        $pastSessions = $session->findPastSessions();

        $nombreFormations= $doctrine->getRepository(Formation::class)->count([]);
        $nombreStagiaires= $doctrine->getRepository( Intern::class)->count([]);
        $nombreModules= $doctrine->getRepository( Module::class)->count([]);
        $nombreCategories= $doctrine->getRepository( Category::class)->count([]);

        return $this->render('home/index.html.twig', [
            'nextSessions' => $nextSessions,
            'currentSessions' => $currentSessions,
            'pastSessions' => $pastSessions,
            'nombreFormations' => $nombreFormations,
            'nombreStagiaires' => $nombreStagiaires,
            'nombreModules' => $nombreModules,
            'nombreCategories' => $nombreCategories,
        ]);
    }

}
