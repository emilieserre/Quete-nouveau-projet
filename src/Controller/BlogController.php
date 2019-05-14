<?php
/**
 * Show all row from article's entity
 *
 * @Route("/", name="index")
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
