<?php

namespace App\Controller;

use App\Entity\NewsletterSubscriber;
use App\Form\NewsletterSubscriberType;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class NewsletterController extends AbstractController
{
    /**
     * @Route("/newsletter/subscribe", name="newsletter_subscribe")
     */
    public function subscribe(Request $request)
    {
        $subscriber = new NewsletterSubscriber();
        $form = $this->createForm(NewsletterSubscriberType::class, $subscriber);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $subscriber->setSubscribeDate(new \DateTime());
            $em = $this->getDoctrine()->getManager();
            $em->persist($subscriber);
            $em->flush();

            return $this->redirectToRoute('newsletter_subscribe_confirm');
        }

        return $this->render('newsletter/subscribe.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/newsletter/subscribe/confirm", name="newsletter_subscribe_confirm")
     */
    public function subscribeConfirm(Request $request)
    {
        return new Response('Subscription ok');
    }
}
