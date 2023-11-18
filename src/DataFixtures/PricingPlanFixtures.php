<?php

namespace App\DataFixtures;

use App\Entity\PricingPlan;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class PricingPlanFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {

        $pricing_plan = new PricingPlan();

        $pricing_plan->setName('30 days for free');

        $manager->persist($pricing_plan);
        $manager->flush();
    }
}
