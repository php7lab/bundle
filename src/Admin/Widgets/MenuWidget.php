<?php

namespace PhpLab\Bundle\Admin\Widgets;

class MenuWidget extends \PhpLab\Web\Widgets\MenuWidget
{

    public $itemOptions = [
        'class' => 'nav-item',
    ];
    public $linkTemplate =
        '<a href="{url}" class="nav-link {class}">
            {icon}
            <p>
                {label}
                {treeViewIcon}
                {badge}
            </p>
        </a>';
    public $submenuTemplate = '<ul class="nav nav-treeview">{items}</ul>';
    public $activateParents = true;
    public $treeViewIcon = '<i class="right fas fa-angle-left"></i>';

    public function __construct()
    {
        $this->items = include(__DIR__ . '/../../../../../../config/menu/admin.php');
    }

}