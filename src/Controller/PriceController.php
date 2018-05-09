<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class PriceController extends Controller
{
    /**
     * @Route("/price", name="price")
     */
    public function index()
    {
        return $this->render('price/index.html.twig', [
            'controller_name' => 'PriceController',
        ]);
    }
}
