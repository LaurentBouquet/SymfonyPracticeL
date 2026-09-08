<?php

namespace App\Controller;

use Psr\Log\LoggerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Contracts\Translation\TranslatorInterface;

final class WelcomeController extends AbstractController
{
    #[Route('/', name: 'app_welcome')]
    public function index(LoggerInterface $logger, TranslatorInterface $translator): Response
    {
        $currentDate = new \DateTimeImmutable(
            'now',
            new \DateTimeZone('Europe/Paris')
        );

        $appName = $translator->trans('DigitalFirstSteps');

        //Tracer les visites
        $logger->info("Application is starting...");

        return $this->render('welcome/index.html.twig', [
            'currentDate' => $currentDate->format('d/m/Y'),
            'appName' => $appName,
        ]);
    }
}
