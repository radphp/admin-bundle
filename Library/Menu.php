<?php


namespace Admin\Library;


use Rad\Events\EventManagerTrait;

class Menu
{
    use EventManagerTrait;

    /** @var array $menu admin menu */
    private static $menu = [];

    const EVENT_GET_MENU = 'bundles.admin.getMenu';

    /**
     * Generate menu, it's only used in this bundle!
     *
     * @return string Menu HTML code
     *
     * @todo return must be array, these HTML codes may be in twig template
     */
    public static function generate()
    {
        self::dispatchEvent(self::EVENT_GET_MENU);

        $return = '';

        // sort menu by it's order
        $orders = array_column(self::$menu, 'order');
        array_multisort($orders, self::$menu);

        foreach (self::$menu as $item) {
            if (isset($item['children'])) {
                $subItems = '';

                // sort menu by it's order
                $orders = array_column($item['children'], 'order');
                array_multisort($orders, $item['children']);

                foreach ($item['children'] as $i) {
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

    /**
     * Add a new menu and return it's ID for further use
     *
     * @param string       $label    Menu Label
     * @param string       $icon     Menu Icon (FontAwesome)
     * @param string       $href     Link
     * @param int          $order    Relative menu order (Lower numbers comes first)
     * @param null|integer $parentId Parent ID which returned from parent menu
     *
     * @return string Menu ID
     */
    public static function addMenu($label, $icon = '', $href = '#', $order = 100, $parentId = null)
    {
        /** @todo replace uniqid generator with a random string generator library */
        $id = uniqid();

        $menu = [
            'icon' => $icon,
            'label' => $label,
            'order' => $order,
            'href' => $href,
        ];

        if ($parentId) {
            $id = $parentId . ':' . $id;
            $parentId = explode(':', $parentId);

            /** @var string $ancestor */
            foreach ($parentId as $ancestor) {
                $firstAncestor = &self::$menu[$ancestor];
            }

            if (!isset($firstAncestor['children'])) {
                $firstAncestor['children'] = [];
            }

            $firstAncestor['children'][$id] = $menu;
        } else {
            self::$menu[$id] = $menu;
        }

        return $id;
    }
}
