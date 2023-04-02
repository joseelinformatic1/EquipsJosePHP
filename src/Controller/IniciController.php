<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class IniciController
{
    #[Route('/inici', name: 'inici1')]
    public function index()
    {
       return new Response("Benvinguda a la web de Equips");
    }
    #[Route('/', name: 'inici2')]
    public function index2()
    {
        return new Response("Benvinguda a la web de Equips");
    }


}
