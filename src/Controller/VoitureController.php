<?php

namespace App\Controller;

use App\Entity\Voiture;
use App\Form\VoitureType;
use App\Repository\VoitureRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;



#[Route('/voiture', name: 'voiture_')]
class VoitureController extends AbstractController
{
    #[Route('/index', name: 'index', methods: ['GET', 'POST'])]
    public function index(VoitureRepository $voitureRepository): Response
    {

        return $this->render('voitures/index.html.twig', [
            'voitures' => $voitureRepository->findBy([]) // ou bien findAll()
        ]);
    }



    // fonction create() pour enrégistrer un nouvel voiture
    #[Route('/create', name: 'create', methods: ['GET', 'POST'])]
    public function create(Request $request,EntityManagerInterface $manager):Response
    {


        // Création du formulaire
        $voiture = new Voiture();
        $form = $this->createForm(VoitureType::class, $voiture);


        // Création de l'voiture
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            $voiture = $form->getData();


        // Pour enrégistrer en base de donnée
        $manager->persist($voiture);
        $manager->flush();

        return $this->redirectToRoute('voiture_index'); // Rediriger vers la page index
        } 

        return $this->render('voitures/create.html.twig', [
            'formVoiture' => $form->createView() // Création du formulaire pour la view(create)
        ]);
    }





        // Fonction edit() pour la modification d'un voiture
        #[Route('/edit/{id}', name: 'edit', methods: ['GET', 'POST'])]
        public function edit(
            Voiture $voiture, 
            Request $request, 
            EntityManagerInterface $manager): Response
        {
    
            // Création du formulaire
            $form = $this->createForm(VoitureType::class, $voiture);
    
    
            $form->handleRequest($request);
            //dd($form);
            if($form->isSubmitted() && $form->isValid()){
                //dd($form->getData());           
                $voiture = $form->getData();
                //dd($voiture);
                
                
                // Pour enrégistrer en base de donnée
                $manager->persist($voiture);
                $manager->flush();
                //dd($chambres);
    
                return $this->redirectToRoute('voiture_index');
            } 
    
    
    
            return $this->render('voitures/edit.html.twig', [
                'formVoiture' => $form->createView() // Création du formulaire pour la view
            ]);
        }

        #[Route('/delete/{id}', name: 'delete', methods: ['GET'])]
        public function delete(Voiture $voiture, EntityManagerInterface $manager): Response
        {        
            $manager->remove($voiture);
            $manager->flush();
            return $this->redirectToRoute('voiture_index');
        }


}
