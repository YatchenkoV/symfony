<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class NewsController extends Controller
{

    public $arr = ["1" => ['title' => 'ЯГЕРМАЙСТЕР', 'content' => 'НАМ НАКОНЕЦ ЗАВЕЗЛИ ЯГЕРМАЙСТЕР! ТЕПЕРЬ ВЫ МОЖЕТЕ ПРОПУСТИТЬ СТАКАНЧИК ВО ВРЕМЯ СТРИЖКИ'],
"2" => ['title' =>'БОРИС «БРИТВА»', 'content' => 'В НАШЕЙ КОМАНДЕ ПОПОЛНЕНИЕ, БОРИС «БРИТВА» СТРИГУНЕЦ, ОБЛАДЕТЕЛЬ МНОЖЕСТВА ТИТУЛОВ И НАГРАД ПОПОЛНИЛ НАШИ СТРОЙНЫЕ РЯДЫ'],
        "3" => ['title' =>'Lorem', 'content' => '"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."'],
        ];
    public $currentRoute = [];


    /**
     * @Route("/news/", name="news")
     */

    public function index()
    {
        return $this->render('news/index.html.twig', [
            'controller_name' => 'NewsController', 'arr' => $this->arr,
        ]);
    }

    /**
     *Matches /news/*
     *
     *@Route("/news/{page}", name="news_show")
     */
    public function show($page)
    {
        foreach ($this->arr as $key => $value)

        {
            dump($key);
            dump($value);
            dump($page);
            if ($key == $page)
            {

                $this->currentRoute = $value;

            }

        }
        return $this->render('news/news.html.twig', [
            'controller_name' => 'NewsController', 'currentRoute' => $this->currentRoute,
        ]);

    }
}
