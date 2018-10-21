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



class CategoryController extends AbstractController
{
    private $twig;


    public function index()
    {
        $categoryManager = new CategoryManager($this->pdo);
        $categorys = $categoryManager->selectAllCategory();
        return $this->twig->render('category.html.twig', ['categorys' => $categorys]);
    }
    public function show(int $id)
    {
        $categoryManager = new CategoryManager($this->pdo);
        $category = $categoryManager->selectOneCategory($id);
        return $this->twig->render('showCategory.html.twig', ['category' => $category]);
    }
}
?>