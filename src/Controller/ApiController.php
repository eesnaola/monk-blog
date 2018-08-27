<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Post;
use Swagger\Annotations as SWG;
use Nelmio\ApiDocBundle\Annotation\Model;

/**
 * @Route("/api")
 */
class ApiController extends AbstractController
{
    /**
     * @SWG\Response(
     *     response=200,
     *     description="Returns a Post array",
     *     @SWG\Schema(
     *         type="array",
     *         @SWG\Items(ref=@Model(type=Post::class, groups={"index"}))
     *     )
     * )
     * @SWG\Tag(name="Blog")
     * @Route("/blogs", methods={"GET"}, name="blogs_list")
     * @return Post[]
     */
    public function index()
    {
        $posts = $this->getDoctrine()->getRepository(Post::class)->findAll();
        return array("data" => $posts, "group" => "index");
    }

    /**
     * @SWG\Response(
     *     response=200,
     *     description="Returns a Post",
     *     @SWG\Schema(
     *         @SWG\Items(ref=@Model(type=Post::class, groups={"show"}))
     *     )
     * )
     * @SWG\Tag(name="Blog")
     * @Route("/blogs/{id}", methods={"GET"}, name="blogs_show")
     * @param Post $post
     * @return Post
     */
    public function show(Post $post)
    {
        return array("data" => $post, "group" => "show");
    }
}
