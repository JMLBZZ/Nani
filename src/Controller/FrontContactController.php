<?php

namespace App\Controller;

use App\Form\ContactType;
use Symfony\Component\Mime\Email;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


class FrontContactController extends AbstractController
{
    #[Route('/contact', name: 'app_front_contact')]
    public function index(Request $request, MailerInterface $mailer): Response
    {
        $form = $this->createForm(ContactType::class);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()) {

            $contactFormData = $form->getData();
            
            $message = (new TemplatedEmail())
                ->from($contactFormData['email'])
                ->to('contact@nani.com')
                ->subject('Vous avez reçu un mail de '.$contactFormData['name'])
                //->htmlTemplate("emails/contactmail.html.twig")
                ->text(
                    "Expéditeur : ".$contactFormData['email'].\PHP_EOL.
                    "Nom : ".$contactFormData['name'].\PHP_EOL.
                    "Téléphone : ".$contactFormData['phone'].\PHP_EOL.
                    "Sujet : ".$contactFormData['subject'].\PHP_EOL.
                    "Message : ".$contactFormData['message'],
                    'text/plain'
                );


            $mailer->send($message);

            $this->addFlash('success', 'Votre message a bien été envoyé');

            return $this->redirectToRoute('app_front_contact');
        }
        
        return $this->render('front_contact/index.html.twig', [
            //'contact' => 'FrontContactController',
            'form' => $form->createView()
        ]);
    }
}




