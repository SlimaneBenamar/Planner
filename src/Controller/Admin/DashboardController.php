<?php

namespace App\Controller\Admin;

use App\Entity\Enseignant;
use App\Entity\Formation;
use App\Entity\Groupe;
use App\Entity\Module;
use App\Entity\Salle;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractDashboardController
{
    /**
     * @Route("/admin", name="admin")
     */
    public function index(): Response
    {
        $routeBuilder = $this->get(AdminUrlGenerator::class);

        return $this->redirect($routeBuilder->setController(SeanceCrudController::class)->generateUrl());
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Outils Gestion Emploi Du Temps');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linktoDashboard('Tableau de bord', 'fa fa-home');
        yield MenuItem::linkToCrud('Formations', 'fas fa-file', Formation::class);
        yield MenuItem::linkToCrud('Enseignants', 'fas fa-file', Enseignant::class);
        yield MenuItem::linkToCrud('Groupes', 'fas fa-file', Groupe::class);
        yield MenuItem::linkToCrud('Modules', 'fas fa-file', Module::class);
        yield MenuItem::linkToCrud('Salles', 'fas fa-file', Salle::class);
    }
}
