<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/shop', name: 'shop')]
class ShopController extends AbstractController
{
    #[Route('', name: '')]
    public function indexAction(): Response
    {
        return $this->render('accueil.html.twig');
    }
}
