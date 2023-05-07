<?php

namespace App\Controller;

use App\Repository\DeveloppeurRepository;
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
        DeveloppeurRepository $developpeurRepository
    ): Response
    {
        //compte les developpeurs en BDD
        $tableauDev = $developpeurRepository->findAll();
        $tableauDevCompter = count($tableauDev);
        return $this->render('home/index.html.twig',
            compact('tableauDevCompter')
        );
    }
}
