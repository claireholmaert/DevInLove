<?php

namespace App\Controller;

use App\Repository\DeveloppeurRepository;
use App\Repository\LangageRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/',
    name: 'main')]
class MainController extends AbstractController
{
    #[Route('/',
        name: '_index')]
    public function index(): Response
    {
        return $this->render('main/index.html.twig');
    }

    #[Route('/home',
        name: '_home')]
    public function home(
        DeveloppeurRepository $developpeurRepository,
        LangageRepository $langageRepository
    ): Response
    {
        //Avoir tous les développeurs dans la table developpeur
        $tableauDev = $developpeurRepository->findAll();
        //compte les developpeurs en BDD
        $tableauDevCompter = count($tableauDev);
        //Tous les langages dans la table
        $langages = $langageRepository->findAll();
        return $this->render('home/index.html.twig',
            compact('tableauDevCompter','tableauDev','langages')

        );
    }
}
