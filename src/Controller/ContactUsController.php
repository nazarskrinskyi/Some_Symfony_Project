<?php

namespace App\Controller;

use App\Form\ContactFormType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ContactUsController extends AbstractController
{
    #[Route('/contact-us', name: 'contact-us')]
    public function index(): Response
    {
        $form = $this->createForm(ContactFormType::class);
        return $this->render('contact_us.html.twig', [
            'form' => $form, // pass the form view to the template
        ]);
    }
}
