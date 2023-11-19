<?php

namespace App\DataFixtures;

use App\Entity\PricingPlan;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use phpDocumentor\Reflection\Types\This;

class A_PricingPlanFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // Loop to create 3 pricing plans
        for ($i = 1; $i <= 3; $i++) {
            $pricing_plan = new PricingPlan();
            $pricing_plan->setName("Plan $i");
            $pricing_plan->setPrice(300 * $i);

            $manager->persist($pricing_plan);
            $this->addReference("pricing_plan_$i", $pricing_plan);
        }

        $manager->flush();
    }
}
