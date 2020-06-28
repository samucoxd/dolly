<?php

namespace App\Controller;

use App\Entity\Producto;
use App\Repository\ProductoRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractController
{
    /**
     * @Route("/", name="dashboard")
     */
    public function index(ProductoRepository $productoRepository)
    {
        return $this->render('dashboard/index.html.twig', [
            'productos' => $productoRepository->findAll(),
        ]);
    }
}
