<?php

namespace Admin;

use Rad\Core\Bundle;
use Twig\Library\Helper as TwigHelper;

/**
 * App Bootstrap
 *
 * @package App
 */
class Bootstrap extends Bundle
{

    public function startup()
    {
        TwigHelper::addCss('file:///Admin/vendor/bootstrap/dist/css/bootstrap.min.css', 50);
        TwigHelper::addCss('file:///Admin/css/main.css', 51);
        TwigHelper::addCss('file:///Admin/css/sb-admin-2.css', 52);
        TwigHelper::addCss('file:///Admin/css/timeline.css', 53);
        TwigHelper::addCss('file:///Admin/vendor/metisMenu/dist/metisMenu.min.css', 54);
        TwigHelper::addCss('file:///Admin/vendor/angular-loading-bar/build/loading-bar.min.css', 55);
        TwigHelper::addCss('file:///Admin/vendor/font-awesome/css/font-awesome.min.css', 56);

        TwigHelper::addJs('file:///Admin/vendor/jquery/dist/jquery.min.js', 50);
        TwigHelper::addJs('file:///Admin/vendor/angular/angular.min.js', 51);
        TwigHelper::addJs('file:///Admin/vendor/bootstrap/dist/js/bootstrap.min.js', 52);
        TwigHelper::addJs('file:///Admin/vendor/angular-ui-router/release/angular-ui-router.min.js', 53);
        TwigHelper::addJs('file:///Admin/vendor/json3/lib/json3.min.js', 54);
        TwigHelper::addJs('file:///Admin/vendor/oclazyload/dist/ocLazyLoad.min.js', 55);
        TwigHelper::addJs('file:///Admin/vendor/angular-loading-bar/build/loading-bar.min.js', 56);
        TwigHelper::addJs('file:///Admin/vendor/angular-bootstrap/ui-bootstrap-tpls.min.js', 57);
        TwigHelper::addJs('file:///Admin/vendor/metisMenu/dist/metisMenu.min.js', 58);
        TwigHelper::addJs('file:///Admin/vendor/Chart.js/Chart.min.js', 59);
        TwigHelper::addJs('file:///Admin/js/app.js', 60);
        TwigHelper::addJs('file:///Admin/js/sb-admin-2.js', 61);

        TwigHelper::addMasterTwig('@App/master.twig');
    }
}
