<?php

namespace App\Controller;

use App\Entity\PricingPlan;
use App\Entity\PricingPlanFeature;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\Persistence\ManagerRegistry;
use Doctrine\ORM\EntityManagerInterface;


class PricingController extends AbstractController
{

    public function __construct(private readonly ManagerRegistry $doctrine, private readonly EntityManagerInterface $entityManager) {}

    #[Route('/pricing', name: 'pricing')]
    public function index(): Response
    {
        $pricing = $this->doctrine->getRepository(PricingPlan::class)->findAll();
        $features = $this->doctrine->getRepository(PricingPlanFeature::class)->findAll();
        return $this->render('pricing/index.html.twig', [
            'pricing' => $pricing,
            'features' => $features
        ]);
    }
}
