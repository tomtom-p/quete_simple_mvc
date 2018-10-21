<?php
/**
 * Created by PhpStorm.
 * User: wilder2
 * Date: 01/10/18
 * Time: 15:03
 */
// src/Controller/ItemController.php



namespace Controller;
use Model\ItemManager;
use Model\Item;




class ItemController extends AbstractController
{

    /**
     * @return string
     * @throws \Twig_Error_Loader
     * @throws \Twig_Error_Runtime
     * @throws \Twig_Error_Syntax
     */
    public function index()
    {
        $itemManager = new ItemManager($this->getPdo());
        $items = $itemManager->selectAll();
        return $this->twig->render('Item/item.html.twig', ['items' => $items]);
    }

    /**
     * @param int $id
     * @return string
     * @throws \Twig_Error_Loader
     * @throws \Twig_Error_Runtime
     * @throws \Twig_Error_Syntax
     */
    public function show(int $id)
    {
        $itemManager = new ItemManager($this->getPdo());
        $item = $itemManager->selectOneById($id);
        return $this->twig->render('Item/showItem.html.twig', ['item' => $item]);
    }

    /**
     * @return string
     * @throws \Twig_Error_Loader
     * @throws \Twig_Error_Runtime
     * @throws \Twig_Error_Syntax
     */
    public function add()
    {

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $itemManager = new ItemManager($this->getPdo());
            $item = new Item();
            $item->setTitle($_POST['title']);
            $id = $itemManager->insert($item);
            header('Location:/item/' . $id);
        }

        return $this->twig->render('Item/add.html.twig');
    }

    /**
     * @param int $id
     * @return string
     * @throws \Twig_Error_Loader
     * @throws \Twig_Error_Runtime
     * @throws \Twig_Error_Syntax
     */
    public function edit(int $id): string
    {
        $itemManager = new ItemManager($this->getPdo());
        $item = $itemManager->selectOneById($id);
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $item->setTitle($_POST['title']);
            $itemManager->update($item);
        }
        return $this->twig->render('Item/edit.html.twig', ['item' => $item]);
    }

    /**
     * @param int $id
     */
    public function delete(int $id)
    {
        $itemManager = new ItemManager($this->getPdo());
        $itemManager->delete($id);
        header('Location:/');
    }
}
?>

