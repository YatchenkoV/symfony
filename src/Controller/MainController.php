<?php

namespace App\Controller;

use App\Entity\Category;
use App\Entity\Post;
use App\Entity\Tag;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;



class MainController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function index()
    {

        return $this->render('main/index.html.twig', [
            'controller_name' => 'MainController',
        ]);
    }

    /**
     * @Route("/blog/", name="blog")
     */
    public function blog()
    {


        $categories = $this->getDoctrine()->getRepository(Category::class)->findAll();

        return $this->render('main/blog.html.twig', compact('categories'));
    }


    /**
     * @Route("/article/{articleId}", name="article")
     */
    public function article($articleId)
    {

        $post = $this->getDoctrine()->getRepository(Post::class)->find($articleId);

        return $this->render('main/article.html.twig', [ 'post' => $post, ]);
    }

    /**
     * @Route("/tags/", name="tags")
     */
    public function listTags()
    {

        $tags = $this->getDoctrine()->getRepository(Tag::class)->findAll();
        dump($tags);
        return $this->render('main/tags.html.twig', ['tags' => $tags, ]);

    }

    /**
     * @Route("/tags/{tagId}", name="tagId")
     */
    public function articleTags($tagId)
    {

        $tag = $this->getDoctrine()->getRepository(Tag::class)->find($tagId);
        $posts = $this->getDoctrine()->getRepository(Post::class)->findAll();

        return $this->render('main/tag.html.twig', [ 'tag' => $tag, 'posts' => $posts ]);
    }




}
