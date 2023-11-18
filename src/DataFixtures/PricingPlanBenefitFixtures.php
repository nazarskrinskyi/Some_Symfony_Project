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

        $benefit_plan->setPricingPlan($this->getReference('pricing_plan'));

        $manager->persist($benefit_plan);

        $manager->flush();
        $this->setReference('benefit', $benefit_plan);
    }
}
