<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MapSearchController extends AbstractController
{
    /**
     * @Route("/map/search", name="map_search")
     */
    public function index(): Response
    {
        return $this->render('map_search/map.html.twig');
    }
}
