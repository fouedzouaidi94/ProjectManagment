<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomePageController extends AbstractController
{
    /**
     * @Route("/", name="home_page")
     */
    public function index(): Response
    {
        $user = $this->get('security.token_storage')->getToken()->getUser();
        $user->getUsername();
        return $this->render('home_page/index.html.twig', [
            'controller_name' => 'HomePageController',
            'AdminOrNot' => in_array('ROLE_ADMIN', $user->getRoles(), true),
            'idUser' => $user->getId(),
        ]);
    }
}
