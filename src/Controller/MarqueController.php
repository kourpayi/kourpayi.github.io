<?php

namespace App\Controller;

use App\Entity\Marque;
use App\Form\MarqueType;
use App\Repository\MarqueRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;



#[Route('/marque', name: 'marque_')]
class MarqueController extends AbstractController
{
    #[Route('/index', name: 'index', methods: ['GET', 'POST'])]
    public function index(MarqueRepository $marqueRepository): Response
    {

        return $this->render('marques/index.html.twig', [
            'marques' => $marqueRepository->findBy([]) // ou bien findAll()
        ]);
    }



    // fonction create() pour enrégistrer un nouvel marque
    #[Route('/create', name: 'create', methods: ['GET', 'POST'])]
    public function create(Request $request,EntityManagerInterface $manager):Response
    {


        // Création du formulaire
        $marque = new Marque();
        $form = $this->createForm(MarqueType::class, $marque);


        // Création de l'marque
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            $marque = $form->getData();


        // Pour enrégistrer en base de donnée
        $manager->persist($marque);
        $manager->flush();

        return $this->redirectToRoute('marque_index'); // Rediriger vers la page index
        } 

        return $this->render('marques/create.html.twig', [
            'formMarque' => $form->createView() // Création du formulaire pour la view(create)
        ]);
    }





        // Fonction edit() pour la modification d'un marque
        #[Route('/edit/{id}', name: 'edit', methods: ['GET', 'POST'])]
        public function edit(
            Marque $marque, 
            Request $request, 
            EntityManagerInterface $manager): Response
        {
    
            // Création du formulaire
            $form = $this->createForm(MarqueType::class, $marque);
    
    
            $form->handleRequest($request);
            //dd($form);
            if($form->isSubmitted() && $form->isValid()){
                //dd($form->getData());           
                $marque = $form->getData();
                //dd($marque);
                
                
                // Pour enrégistrer en base de donnée
                $manager->persist($marque);
                $manager->flush();
                //dd($chambres);
    
                return $this->redirectToRoute('marque_index');
            } 
    
    
    
            return $this->render('marques/edit.html.twig', [
                'formMarque' => $form->createView() // Création du formulaire pour la view
            ]);
        }

        #[Route('/delete/{id}', name: 'delete', methods: ['GET'])]
        public function delete(Marque $marque, EntityManagerInterface $manager): Response
        {        
            $manager->remove($marque);
            $manager->flush();
            return $this->redirectToRoute('marque_index');
        }


}
