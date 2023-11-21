<?php

namespace App\Controller\Admin;

use App\Entity\PricingPlan;
use App\Form\PricingPlanBenefitType;
use App\Form\PricingPlanFeatureType;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\CollectionField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use phpDocumentor\Reflection\Types\Integer;

class PricingPlanCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return PricingPlan::class;
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            // set this option if you prefer the page content to span the entire
            // browser width, instead of the default design which sets a max width
            ->renderContentMaximized()

            // set this option if you prefer the sidebar (which contains the main menu)
            // to be displayed as a narrow column instead of the default expanded design
            ->renderSidebarMinimized()
            // this defines the pagination size for all CRUD controllers
            // (each CRUD controller can override this value if needed)
            ->setPaginatorPageSize(30);
    }



    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('name'),
            IntegerField::new('price'),
            CollectionField::new('benefits')
                ->setEntryType(PricingPlanBenefitType::class)
                ->onlyOnForms(),
            CollectionField::new('features')
                ->setEntryType(PricingPlanFeatureType::class)
                ->onlyOnForms()
        ];
    }

}
