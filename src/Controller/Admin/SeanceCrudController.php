<?php

namespace App\Controller\Admin;

use App\Entity\Seance;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\Field;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;

class SeanceCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Seance::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            Field::new('id')->hideOnForm(),
            Field::new('DateDebut'),
            Field::new('DateFin'),
            Field::new('type'),
            AssociationField::new('idEnseignant'),
            AssociationField::new('idFormation'),
            AssociationField::new('idModule'),
            AssociationField::new('idSalle'),
            AssociationField::new('groupe')
        ];
    }
}
