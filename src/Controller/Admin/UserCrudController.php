<?php

namespace App\Controller\Admin;

use App\Entity\User;
use App\Entity\Regles;
use App\Form\UserType;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\EmailField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Vich\UploaderBundle\Form\Type\VichImageType;


class UserCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return User::class;
    }


    public function configureFields(string $pageName): iterable
    {
        $regles =  $this->getDoctrine()->getManager()->getRepository(Regles::class)->findAll();
        return [
            IdField::new('id')->hideOnForm(),
            ImageField::new('Photo')
            ->setBasePath('/uploads/Photo')
            ->onlyOnIndex(),
            // TextareaField::new('Photo')
            // ->setFormType(VichImageType::class)
            // ->hideOnIndex(),
            EmailField::new('email')->hideOnIndex(),
            TextField::new('nomUtilisateur'),
            IntegerField::new('telephone'),
            TextField::new('type'),
            TextField::new('regles')->hideOnForm(),
            AssociationField::new('regles')->onlyOnForms()->setFormTypeOptions(["choices" => $regles]),
        ];
    }
 
}
