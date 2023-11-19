<?php

namespace App\DataFixtures;

use App\Entity\PricingPlan;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use phpDocumentor\Reflection\Types\This;

class PricingPlanFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // Loop to create 3 pricing plans
        for ($i = 1; $i <= 10; $i++) {
            $rand = rand(1,3);
            $pricing_plan = $this->getReference("pricing_plan_$rand");

            $pricing_plan->addBenefit($this->getReference("benefit_" . rand(1, 10))); // Randomly assign benefits
            $pricing_plan->addFeature($this->getReference("feature_" . rand(1, 5))); // Randomly assign features

            $manager->persist($pricing_plan);
        }

        $manager->flush();
    }
}
