<?php

namespace App\DataFixtures;

use App\Entity\PricingPlanBenefit;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class PricingPlanBenefitFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {

        $benefit_plan = new PricingPlanBenefit();

        $benefit_plan->setName('30 days for free');
        $benefit_plan->setPricingPlan();

        $manager->persist($benefit_plan);

        $manager->flush();
    }
}
