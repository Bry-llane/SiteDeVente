<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\UserType;
use Doctrine\ORM\EntityManagerInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/user', name: 'user')]
class UserController extends AbstractController
{
    #[Route('/createuser', name: '_createUser')]
    public function newUser(EntityManagerInterface $em,Request $request):Response
    {
        $user = new User();
        $form = $this->createForm(UserType::class, $user);
        $form->add('Envoyer',SubmitType::class,['label' => 'creer compte']);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $em->flush();
            $this->addFlash('info','creation reussi');
            return $this->redirectToRoute('acceuil');

        }
        if($form->isSubmitted())
            $this->addFlash('info','formulaire de creation incorect');


        return $this->render('User/new.html.twig', ['form' => $form->createView(),
        ]);

    }
}
