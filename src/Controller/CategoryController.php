<?php
/**
 * Created by PhpStorm.
 * User: wilder2
 * Date: 01/10/18
 * Time: 15:03
 */
// src/Controller/CategoryController.php



namespace Controller;
use Model\CategoryManager;
use Twig_Loader_Filesystem;
use Twig_Environment;



class CategoryController
{
    private $twig;

    public function __construct()
    {
        $loader = new Twig_Loader_Filesystem(__DIR__.'/../View');
        $this->twig = new Twig_Environment($loader);

    }
    public function index()
    {
        $categoryManager = new CategoryManager();
        $categorys = $categoryManager->selectAllCategory();
        return $this->twig->render('category.html.twig', ['categorys' => $categorys]);
    }
    public function show(int $id)
    {
        $categoryManager = new CategoryManager();
        $category = $categoryManager->selectOneCategory($id);
        return $this->twig->render('showCategory.html.twig', ['category' => $category]);
    }
}
?>