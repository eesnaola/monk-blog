<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use App\Entity\Post;

class DefaultController extends AbstractController
{
    /**
     * @Route("/", name="post_index", methods="GET")
     * @return Response
     */
    public function index(): Response
    {
        $posts = $this->getDoctrine()->getRepository(Post::class)->findBy(array(), array('id' => 'DESC'));
        return $this->render('default/index.html.twig', ['posts' => $posts]);
    }

    /**
     * @Route("/{id}", name="post_show", methods="GET", requirements={"id"="\d+"})
     * @param Post $post
     * @return Response
     */
    public function show(Post $post): Response
    {
        return $this->render('default/show.html.twig', ['post' => $post]);
    }
}
