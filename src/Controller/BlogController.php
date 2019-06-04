<?php
// src/Controller/BlogController.php
namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class BlogController extends AbstractController
{
    /**
     * @Route("/blog", name="blog_index")
     */

    public function index()
    {
        return $this->render('base.html.twig', [
            'owner' => 'Emilie',
        ]);
    }


    /**
     * @Route("/blog/show/{slug}", requirements={"slug"="[a-z0-9-\.:\/\/=&]+"},
     *     name="blog_show")
     */
    public function show(string $slug='Mon premier slug')
    {
        $title = ucwords(str_replace('-', ' ', $slug));
        return $this->render('blog/show.html.twig', [
            'slug' => $title,
        ]);
    }
    }
}

