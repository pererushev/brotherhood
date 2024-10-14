<?php

namespace App\Controller;

use App\Repository\DeveloperRepository;
use App\Repository\ProjectRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class StatController extends AbstractController
{
    #[Route('/stat', name: 'app_stat')]
    public function index(ProjectRepository $projectRepository, DeveloperRepository $developerRepository): Response
    {
        // dd($projectRepository->count());

        return $this->render('stat/index.html.twig', [
            'controller_name' => 'StatController',
            'projects' => $projectRepository->count(),
            'developers' => $developerRepository->count()
        ]);
    }
}
