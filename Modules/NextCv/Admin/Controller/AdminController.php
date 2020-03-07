<?php

namespace NextCv\Modules\Admin\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Repository\ResumeRepository;

class AdminController extends AbstractController
{
    private $repository;

    public function __construct()
    {
        $this->repository = $repository;
    }


}
