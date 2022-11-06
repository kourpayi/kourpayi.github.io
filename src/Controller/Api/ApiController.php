<?php

namespace App\Controller\Api;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Validator\Constraints\Json;


#[Route('/api/voiture', name: 'api_voiture_')]
class VoitureController extends AbstractController
{
    #[Route('/api/voiture/index', name: 'api_voiture_index', methods:["GET"])]
    public function index(): JsonResponse
    {
        return new JsonResponse([

        ]);
    }


    #[Route('/api/voiture/create', name: 'api_voiture_create', methods:["POST"])]
    public function create(): JsonResponse
    {
        return new JsonResponse([

        ]);
    }

    #[Route('/api/voiture/update', name: 'api_voiture_update', methods:["POST"])]
    public function update(): JsonResponse
    {
        return new JsonResponse([

        ]);
    }

    #[Route('/api/voiture/delete', name: 'api_voiture_delete', methods:["POST"])]
    public function delete(): JsonResponse
    {
        return new JsonResponse([

        ]);
    }

}
