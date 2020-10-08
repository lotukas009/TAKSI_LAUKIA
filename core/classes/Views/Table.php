<?php

namespace Core\Views;

use Core\View;

class Table extends View
{
    public function render(string $template_path): string
    {
        $template_path = ROOT . '/core/templates/' . $template_path;

        return parent::render($template_path);
    }
}