<?php

namespace App\Controller;

use App\Entity\Produit;
use App\Form\ProduitType;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ManagerRegistry;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/shop', name: 'shop')]
class ShopController extends AbstractController
{
<<<<<<< HEAD
    #[Route('/add_shop', name: '_addshop')]
    public function addShop(EntityManagerInterface $em,Request $request): Response
    {

=======
    #[Route('/list', name: '_list')]
    public function listAction(ManagerRegistry $doctrine): Response
    {
        $em = $doctrine->getManager();
        $produitsRepository = $em->getRepository(Produit::class);
        $produits = $produitsRepository->findAll();

        $args = array(
            'produits' => $produits
        );


        return $this->render('shop/list.html.twig', $args);
    }

    #[Route('/add', name: '_add')]
    public function addAction(EntityManagerInterface $em, Request $request): Response
    {
        $produit = new Produit();

        $form = $this->createForm(ProductType::class, $produit);
        $form->add('send', SubmitType::class, ['label' => 'Ajouter un produit']);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()) {
            $em->persist($produit);
            $em->flush();
            $this->addFlash('info', 'Produit créé !');
            return $this->redirectToRoute("accueil");
        }

        $args = array('myform' => $form->createView());
        return $this->render('Shop/add.html.twig', $args);
>>>>>>> 24df82762959a56f0d1ddad539a6a6b3f9c4aedb
    }
}
