<?php

namespace Admin\Action;

use Admin\Library\Menu;
use App\Action\AppAction;
use Twig\Library\Helper as TwigHelper;

/**
 * Index Action
 *
 * @package Admin\Action
 */
class IndexAction extends AppAction
{
    /**
     * {@inheritdoc}
     */
    public function __invoke()
    {
        TwigHelper::addCss('file:///Admin/vendor/bootstrap/dist/css/bootstrap.min.css');
        TwigHelper::addCss('file:///Admin/vendor/font-awesome/css/font-awesome.min.css');
        TwigHelper::addCss('file:////code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css');
        TwigHelper::addCss('file:///Admin/css/AdminLTE.min.css', 10);
        TwigHelper::addCss('file:///Admin/css/skins/skin-blue.min.css', 20);

        TwigHelper::addJs('file:////oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js');
        TwigHelper::addJs('file:////oss.maxcdn.com/respond/1.4.2/respond.min.js', 10);
        TwigHelper::addJs('file:///Admin/vendor/jquery/dist/jquery.min.js', 20);
        TwigHelper::addJs('file:///Admin/vendor/bootstrap/dist/js/bootstrap.min.js', 30);
        TwigHelper::addJs('file:///Admin/js/app.min.js', 40);

        $template = 'dashboard';
        $args = func_get_args();

        TwigHelper::addMasterTwig('@Admin/master.twig');

        /** @var \Twig_Environment $twig */
        $twig = $this->getContainer()->get('twig');
        $twig->addGlobal('menu', Menu::generate());

        if ($args[0] == 'bundles') {
            $this->getRouter()->setPrefix(['admin', 'bundles']);

            array_shift($args);
            $args = implode('/', $args);

            $response = $this->forward($args, $this->getRequest()->getMethod());

            $this->getResponder()->setData('response', $response);
        } else {
            if ($args) {
                $template = implode('/', $args);
            }
        }

        $this->getResponder()->setData('template', $template);
    }

    /**
     * Needs authentication
     *
     * @return bool
     */
    public function needsAuthentication()
    {
        return true;
    }
}
