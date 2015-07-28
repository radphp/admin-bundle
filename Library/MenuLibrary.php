<?php


namespace Admin\Library;


class MenuLibrary
{
    public static function generate()
    {
        $menu = [
            [
                'sref' => 'dashboard.home',
                'icon' => 'fa-dashboard',
                'label' => 'Dashboard',
            ],
            [
                'sref' => 'dashboard.chart',
                'icon' => 'fa-bar-chart-o',
                'label' => 'Charts',
            ],
            [
                'sref' => 'dashboard.table',
                'icon' => 'fa-table',
                'label' => 'Tables',
            ],
            [
                'sref' => 'dashboard.form',
                'icon' => 'fa-edit',
                'label' => 'Forms',
            ],
        ];

        $return = '';
        foreach ($menu as $item) {
            $return .= "<li ui-sref-active=\"active\">
                        <a ui-sref=\"{$item['sref']}\"><i class=\"fa {$item['icon']} fa-fw\"></i> {$item['label']}</a>
                    </li>";
        }
        return $return . '<li ng-class="{active: collapseVar==1}">{{dropDown}}
                <a href="" ng-click="check(1)"><i class="fa fa-wrench fa-fw"></i> UI Elements<span
                        class="fa arrow"></span></a>
                <ul class="nav nav-second-level" collapse="collapseVar!=1">
                    <li ui-sref-active="active">
                        <a ui-sref="dashboard.panels-wells">Panels and Wells</a>
                    </li>
                    <li ui-sref-active="active">
                        <a ui-sref="dashboard.buttons">Buttons</a>
                    </li>
                    <li ui-sref-active="active">
                        <a ui-sref="dashboard.notifications">Notifications</a>
                    </li>
                    <li ui-sref-active="active">
                        <a ui-sref="dashboard.typography">Typography</a>
                    </li>
                    <li ui-sref-active="active">
                        <a ui-sref="dashboard.icons"> Icons</a>
                    </li>
                    <li ui-sref-active="active">
                        <a ui-sref="dashboard.grid">Grid</a>
                    </li>
                </ul>
            </li>
            <li ng-class="{active: collapseVar==2}">
                <a href="" ng-click="check(2)"><i class="fa fa-sitemap fa-fw"></i> Multi-Level Dropdown<span
                        class="fa arrow"></span></a>
                <ul class="nav nav-second-level" collapse="collapseVar!=2">
                    <li>
                        <a href="">Second Level Item</a>
                    </li>
                    <li>
                        <a href="">Second Level Item</a>
                    </li>
                    <li ng-init="third=!third" ng-class="{active: multiCollapseVar==3}">
                        <a href="" ng-click="multiCheck(3)">Third Level <span class="fa arrow"></span></a>
                        <ul class="nav nav-third-level" collapse="multiCollapseVar!=3">
                            <li>
                                <a href="">Third Level Item</a>
                            </li>
                            <li>
                                <a href="">Third Level Item</a>
                            </li>
                            <li>
                                <a href="">Third Level Item</a>
                            </li>
                            <li>
                                <a href="">Third Level Item</a>
                            </li>

                        </ul>
                    </li>
                </ul>
            </li>
            <li ng-class="{active:collapseVar==4}">
                <a href="" ng-click="check(4)"><i class="fa fa-files-o fa-fw"></i> Sample Pages<span
                        class="fa arrow"></span></a>
                <ul class="nav nav-second-level" collapse="collapseVar!=4">
                    <li ng-class="{active: selectedMenu==\'blank\'}">
                        <a ui-sref="dashboard.blank" ng-click="selectedMenu=\'blank\'">Blank Page</a>
                    </li>
                    <li>
                        <a ui-sref="login">Login Page</a>
                    </li>
                </ul>
            </li>';
    }
}
