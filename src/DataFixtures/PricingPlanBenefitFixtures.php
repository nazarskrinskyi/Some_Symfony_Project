<?php

namespace App\DataFixtures;

use App\Entity\PricingPlanBenefit;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class PricingPlanBenefitFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {

        // Loop to create 10 benefits
        for ($i = 1; $i <= 10; $i++) {
            $benefit_plan = new PricingPlanBenefit();
            $benefit_plan->setName("Benefit $i");
            $rand = rand(1,3);
            $benefit_plan->setPricingPlan($this->getReference("pricing_plan_$rand"));

            $manager->persist($benefit_plan);
            $this->addReference("benefit_$i", $benefit_plan);
        }

        $manager->flush();
    }
}
