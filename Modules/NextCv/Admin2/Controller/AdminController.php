<?php

namespace NextCv\Modules\Admin\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use App\Repository\ResumeRepository;

class AdminController extends AbstractController
{
    private $repository;

    public function __construct(ResumeRepository $repository)
    {
        $this->repository = $repository;
    }

    public function all(Request $request, $ja): JsonResponse
    {
        dump($ja);
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
