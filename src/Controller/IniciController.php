<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class IniciController extends AbstractController{
    #[Route('/', name: 'inici')]
    public function index()
    {
       return $this-> render('inici.html.twig',['message' => "Benvinguda a la web de Equips"]);
    }



}
