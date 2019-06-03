<?php
// src/Controller/BlogController.php
namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class BlogController extends AbstractController
{
    /**
     * @Route("/", name="blog_index")
     */

    public function index()
    {
        return $this->render('base.html.twig', [
            'owner' => 'Emilie',
        ]);
    }
}