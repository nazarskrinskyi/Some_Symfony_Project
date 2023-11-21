<?php

namespace App\Controller\Admin;

use App\Entity\PricingPlan;
use App\Entity\PricingPlanBenefit;
use App\Entity\PricingPlanFeature;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\UX\Chartjs\Builder\ChartBuilderInterface;
use Symfony\UX\Chartjs\Model\Chart;

class DashboardController extends AbstractDashboardController
{

    public function __construct(private readonly ChartBuilderInterface $chartBuilder, private readonly AdminUrlGenerator $adminUrlGenerator)
    {}

    #[Route('/admin', name: 'admin')]
    public function index(): Response
    {
        $chart = $this->chartBuilder->createChart(Chart::TYPE_LINE);
        // ... set chart data and options

        // Prepare data to be passed to the template
        $chartData = $this->prepareChartData($chart);

//        $url = $this->adminUrlGenerator
//            ->setController(PricingPlanCrudController::class)
//            ->generateUrl();
        return $this->render('admin/index.html.twig', [
            'chartData' => $chartData,
        ]);
    }

    // Method to prepare chart data
    private function prepareChartData(Chart $chart): array
    {
        return [
            'type' => $chart->getType(),
            'data' => [
                'labels' => ['Label 1', 'Label 2', 'Label 3'], // Example labels
                'datasets' => [
                    [
                        'label' => 'My Dataset',
                        'data' => [10, 20, 30], // Example data
                    ],
                ],
            ],
            'options' => [
                // ... specify ChartJS options as needed
            ],
        ];
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Symfony Website');
    }

    public function configureMenuItems(): iterable
    {
        return [
            MenuItem::linkToDashboard('Dashboard', 'fa fa-home'),

            MenuItem::section('My Tables'),
            MenuItem::linkToCrud('Pricing', 'fa fa-tags', PricingPlan::class),
            MenuItem::linkToCrud('Features', 'fa fa-circle-info', PricingPlanFeature::class),
            MenuItem::linkToCrud('Benefits', 'fa fa-star', PricingPlanBenefit::class),

        ];
    }
}
