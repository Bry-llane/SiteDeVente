<?php

namespace App\Controller;

use App\Entity\Panier;
use App\Entity\Produit;
use Doctrine\ORM\EntityManagerInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/panier', name: 'panier')]
class PanierController extends AbstractController
{
    #[Route('/list', name: '_list')]
    public function listAction(EntityManagerInterface $em): Response
    {
        return $this->render('listPanier.html.twig');
    }

    #[Route('/delete/{id}', name: '_delete')]
    public function deleteAction(Product $id, EntityManagerInterface $em): Response
    {
        $panierRepository = $em->getRepository();

        $panierRepo = $em->getRepository('App:Panier');
        $panier = $panierRepo->findOneBy(['user' => $user, 'product' => $id_product]);

        //Quantity dans le panier
        $panierQuantity = $panier->getQuantity();

        // Quantity de base
        $produitQuantity = $id_product->getEnStock();

        $id_product->setEnStock($produitQuantity + $panierQuantity);

        $em->remove($panier);
        $em->persist($id_product);
        $em->flush();
        return $this->redirectToRoute('panier_index');
    }

    #[Route('/add/{id}',name: '_add')]
    public function addAction(Produit $id, EntityManagerInterface $em): Response
    {
        $panierRepository = $em->getRepository();


        
    }
}
