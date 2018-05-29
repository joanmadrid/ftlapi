<?php

namespace App\Controller;

use App\Services\ShipService;
use Symfony\Component\HttpFoundation\Request;
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
    public function create(Request $request)
    {
        $shipParameters = $request->request->all();

        $ship = $this->get(ShipService::class)->create($shipParameters);

        return $this->json($ship);
    }
}
