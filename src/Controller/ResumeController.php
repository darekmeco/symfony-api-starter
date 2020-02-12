<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use App\Repository\ResumeRepository;

class ResumeController extends AbstractController
{
    private $repository;
    public function __construct(ResumeRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
    * @Route("/api/resumes", name="get_all_resumes", methods={"GET"})
    */
    public function all(): JsonResponse
    {
        $resumes = $this->repository->findAll();
        $data = [];

        foreach ($resumes as $resume) {
            $data[] = [
            'id' => $resume->getId(),
            'firstName' => $resume->getFirstName(),
            'lastName' => $resume->getLastName(),
            'position' => $resume->getPosition()
        ];
        }

        return new JsonResponse($data, Response::HTTP_OK);
    }
}
