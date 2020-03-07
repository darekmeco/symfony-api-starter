<?php declare(strict_types=1);

namespace NextCv\Modules\Resume\Controller;

use NextCv\Modules\Resume\Repository\ResumeRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;


class ResumeController extends AbstractController
{
    private $repository;
    private $admin;

    public function __construct(ResumeRepository $repository)
    {
        $this->repository = $repository;
    }

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

    public function allDql(): JsonResponse
    {
        $resumes = $this->repository->findAllDql();
        $encoders = [new JsonEncoder()];
        $normalizers = [new ObjectNormalizer()];
        $serializer = new Serializer($normalizers, $encoders);

        return new JsonResponse($serializer->serialize($resumes, 'json'), Response::HTTP_OK);
    }
}
