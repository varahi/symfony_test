<?php

namespace App\Controller\Admin;

use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Item;
use App\Entity\Category;

class DashboardController extends AbstractDashboardController
{
    /**
     * @Route("/admin", name="admin")
     */
    public function index(): Response
    {
        //return parent::index();
        $routeBuilder = $this->get(AdminUrlGenerator::class);
        return $this->redirect($routeBuilder->setController(ItemCrudController::class)->generateUrl());
    }


    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Test Admin Panel');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToRoute('Back to the site', 'fa fa-home', 'app_home');

        yield MenuItem::section('Items and categories');
        yield MenuItem::subMenu('Items', 'fa fa-tags')->setSubItems([
            MenuItem::linkToCrud('Items', 'fa fa-list', Item::class),
            MenuItem::linkToCrud('Categories', 'fa fa-cog', Category::class),
        ]);
    }
}
