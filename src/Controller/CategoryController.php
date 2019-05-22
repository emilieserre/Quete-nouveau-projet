<?php

namespace App\Controller;

use App\Entity\Category;
use App\Form\CategoryType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/category")
 */

class CategoryController extends AbstractController
{
    /**
     * @param Request $request
     * @return Response
     * @Route("/new", name="blog_category")
     */

    public function addNewCategory(Request $request): Response
    {
        $category = new Category();
        $form = $this->createForm(CategoryType::class, $category);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($category);
            $em->flush();
        }
        return $this->render('blog/new.html.twig', [
                'category' => $category,
                'form' => $form->createView()
            ]
        );
    }
}
