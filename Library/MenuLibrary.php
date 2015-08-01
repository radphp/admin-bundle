<?php


namespace Admin\Library;


class MenuLibrary
{
    public static function generate()
    {
        $menu = [
            [
                'href' => '/Admin/bundles/pages',
                'icon' => 'fa-file-text',
                'label' => 'Pages',
            ],
        ];

        $return = $js = '';
        foreach ($menu as $item) {
            $return .= "<li>
                        <a href=\"{$item['href']}\"><i class=\"fa {$item['icon']} fa-fw\"></i> {$item['label']}</a>
                    </li>";
        }

        //$return .= '<li ng-class="{active: collapseVar==1}">{{dropDown}}
        //        <a href="" ng-click="check(1)"><i class="fa fa-wrench fa-fw"></i> UI Elements<span
        //                class="fa arrow"></span></a>
        //        <ul class="nav nav-second-level" collapse="collapseVar!=1">
        //            <li ui-sref-active="active">
        //                <a ui-sref="dashboard.panels-wells">Panels and Wells</a>
        //            </li>
        //            <li ui-sref-active="active">
        //                <a ui-sref="dashboard.buttons">Buttons</a>
        //            </li>
        //            <li ui-sref-active="active">
        //                <a ui-sref="dashboard.notifications">Notifications</a>
        //            </li>
        //            <li ui-sref-active="active">
        //                <a ui-sref="dashboard.typography">Typography</a>
        //            </li>
        //            <li ui-sref-active="active">
        //                <a ui-sref="dashboard.icons"> Icons</a>
        //            </li>
        //            <li ui-sref-active="active">
        //                <a ui-sref="dashboard.grid">Grid</a>
        //            </li>
        //        </ul>
        //    </li>';

        return $return;
    }
}
