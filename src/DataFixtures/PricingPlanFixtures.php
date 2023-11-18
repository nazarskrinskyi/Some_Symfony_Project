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

        // Retrieve the reference to the PricingPlan entity
        $pricing_plan = $this->getReference('pricing_plan');
        $pricing_plan->addBenefit($this->getReference('benefit'));
        $pricing_plan->addFeature($this->getReference('feature'));


        $manager->persist($pricing_plan);
        $manager->flush();


    }
}
