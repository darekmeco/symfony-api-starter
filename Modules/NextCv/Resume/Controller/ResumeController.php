<?php declare(strict_types=1);

namespace NextCv\Modules\Resume\Controller;

use NextCv\Modules\Resume\Repository\ResumeRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\SerializerInterface;


class ResumeController extends AbstractController
{
    private $repository;
    private $serializer;
    private $normalizer;

    public function __construct(ResumeRepository $repository, SerializerInterface $serializer, ObjectNormalizer $normalizer)
    {
        $this->repository = $repository;
        $this->serializer = $serializer;
        $this->normalizer = $normalizer;
    }

    public function all(): JsonResponse
    {
        $resumes = $this->repository->findAll();
        return new JsonResponse($this->serializer->normalize($resumes), Response::HTTP_OK);
    }

    public function allDql(): JsonResponse
    {
        $resumes = $this->repository->findAllDql();
        return new JsonResponse($this->serializer->normalize($resumes), Response::HTTP_OK);
    }

    public function store(Request $request)
    {
        $resume = $this->repository->store($request->request->all());
        return new JsonResponse($resume, Response::HTTP_OK);
    }
}
