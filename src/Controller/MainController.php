<?php

namespace App\Controller;

use App\Entity\Category;
use App\Entity\Post;
use App\Entity\Tag;
use App\Repository\CategoryRepository;
use App\Repository\TagRepository;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Entity;



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
    public function blog(CategoryRepository $categoryRepository)
    {
        $categories = $categoryRepository->findAll();
        return $this->render('main/blog.html.twig', compact('categories'));
    }


    /**
     * @Route("/article/{postSlug}", name="article")
     * @ParamConverter("post", options={"mapping":{"postSlug":"slug"}})
     */
    public function article(Post $post)
    {
        return $this->render('main/article.html.twig', [ 'post' => $post, ]);
    }

    /**
     * @Route("/tags/", name="tags")
     */
    public function listTags(TagRepository $tagRepository)
    {

        $tags = $tagRepository->findAll();

        return $this->render('main/tags.html.twig', ['tags' => $tags, ]);

    }


    /**
     * @Route("/tags/{tagId}", name="tag")
     * @Entity("tag", expr="repository.find(tagId)")
     */
    public function tagArticle(Tag $tag)
    {
        return $this->render('main/tag.html.twig', [ 'tag' => $tag,  ]);
    }






}
