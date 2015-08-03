<?php


namespace Admin\Library;


class MenuLibrary
{
    public static function generate()
    {
        $menu = [
            [
                'icon' => 'fa-file-text',
                'label' => 'Pages',
                'children' => [
                    [
                        'href' => '/admin/bundles/pages',
                        'label' => 'Pages',
                    ],
                    [
                        'href' => '/admin/bundles/pages',
                        'label' => 'Add Page',
                    ]
                ]
            ],
        ];

        $return = $js = '';
        foreach ($menu as $item) {
            if (isset($item['children'])) {
                $subItems = '';
                foreach ($item['children'] as $i){
                    $subItems .= "<li><a href=\"{$i['href']}\">{$i['label']}</a></li>";
                }

                $return .= "<li class=\"treeview\">
                  <a href=\"#\">
                    <i class=\"fa {$item['icon']}\"></i>
                    <span>{$item['label']}</span>
                    <i class=\"fa fa-angle-left pull-right\"></i>
                  </a>
                  <ul class=\"treeview-menu\">
                    {$subItems}
                  </ul>
                </li>";
            } else {
                $return .= "<li>
                        <a href=\"{$item['href']}\">
                            <i class=\"fa {$item['icon']} fa-fw\"></i> <span>{$item['label']}</span>
                        </a>
                    </li>";
            }
        }

        return $return;
    }
}
