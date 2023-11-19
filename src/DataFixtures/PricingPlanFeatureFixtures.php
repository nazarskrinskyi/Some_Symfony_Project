<?php

namespace App\DataFixtures;

use App\Entity\PricingPlanFeature;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class PricingPlanFeatureFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // Loop to create 5 features
        for ($i = 1; $i <= 5; $i++) {
            $features_plan = new PricingPlanFeature();
            $features_plan->setName("Feature $i");

            $manager->persist($features_plan);
            $this->addReference("feature_$i", $features_plan);
        }

        $manager->flush();
    }
}
