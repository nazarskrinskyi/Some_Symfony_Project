<?php

namespace App\DataFixtures;

use App\Entity\PricingPlanFeature;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class PricingPlanFeatureFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {



        $features_plan = new PricingPlanFeature();

        $manager->persist($features_plan);

        $manager->flush();
    }
}
