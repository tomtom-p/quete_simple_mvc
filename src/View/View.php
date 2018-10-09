<?php
/**
 * Created by PhpStorm.
 * User: wilder2
 * Date: 09/10/18
 * Time: 11:38
 */
//src/View/View.php
namespace View;

class View
{
    public function render(string $path, array $params) :string
    {
        extract($params);
        ob_start();
        require $path;
        $content = ob_get_clean();
        return $content;
    }
}