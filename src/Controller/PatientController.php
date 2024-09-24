<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Entity\Patient;
use App\Form\PatientFormType;

class PatientController extends AbstractController
{
    #[Route('/patient', name: 'app_patient')]
    public function register(Request $request): Response
    {
        $patient = new Patient();

        $form = $this->createForm(PatientFormType::class, $patient);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($patient);
            $entityManager->flush();

            return $this->redirectToRoute('patient_confirmation');
        }

        return $this->render('patient/register.html.twig', [
            'form' => $form->createView(),
        ]);
    }



}
