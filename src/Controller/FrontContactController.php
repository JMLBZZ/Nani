<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Form\ContactType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Mime\Email;
use Symfony\Component\Mailer\MailerInterface;

class FrontContactController extends AbstractController
{
    #[Route('/front/contact', name: 'app_front_contact',)]
    public function index(Request $request, MailerInterface $mailer): Response
    {
        $form = $this->createForm(ContactType::class);
        $form->handleRequest($request);


        if($form->isSubmitted() && $form->isValid()) {

            $contactFormData = $form->getData();
            
            $message = (new Email())
                ->from($contactFormData['email'])
                ->to('contact@nani.com')
                ->subject('Vous avez reçu un email')
                ->text('Expéditeur : '.$contactFormData['email'].\PHP_EOL."Message : ".
                    $contactFormData['message'],
                    'text/plain');
            $mailer->send($message);

            $this->addFlash('success', 'Vore message a été envoyé');

            return $this->redirectToRoute('app_front_contact');
        }
        
        return $this->render('front_contact/index.html.twig', [
            //'controller_name' => 'FrontContactController',
            'form' => $form->createView()
        ]);
    }
}




