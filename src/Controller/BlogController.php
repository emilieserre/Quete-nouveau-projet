<?php

// src/Controller/BlogController.php
namespace App\Controller;

use App\Entity\Article;
use App\Entity\Category;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * class BlogController
 * @package App\Controller
 * @Route("/blog")
 */

class BlogController extends AbstractController
{
    /**
     * Show all row from article's entity
     *
     * @Route("/", name="blog_index")
     * @return Response A response instance
     */
    public function index(): Response
    {
        $articles = $this->getDoctrine()
            ->getRepository(Article::class)
            ->findAll();
        if (!$articles) {
            throw $this->createNotFoundException(
                'No article found in article\'s table.'
            );
        }
        return $this->render(
            'blog/index.html.twig',
            ['articles' => $articles]
        );
    }

    /**
     * @Route("/article/{id}", name="article_show")
     */
    public function show(Article $article): Response
    {
        return $this->render('article.html.twig', ['article'=>$article]);
    }

    /**
     * @param string $categoryName
     * @Route("/category/{categoryName}", name="show_category")
     * @return Response A response instance
     */
    public function showByCategory(string $categoryName)
    {
        $category = $this
            ->getDoctrine()->getRepository(Category::class)
            ->findOneBy(['name' => $categoryName]);
        $categoryArticles = $this->getDoctrine()
            ->$category->getArticles();
        return $this->render(
            'blog/category.html.twig', [
                'categoryArticles' => $categoryArticles
            ]
        );
    }
}