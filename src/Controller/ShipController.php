<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

/**
 * @Route("/ship")
 */
class ShipController extends Controller
{
    /**
     * @Route("/create", name="ship")
     */
    public function create()
    {
        return $this->json([
            'message' => 'Welcome to your new controller!',
            'path' => 'src/Controller/ShipController.php',
        ]);
    }
}
