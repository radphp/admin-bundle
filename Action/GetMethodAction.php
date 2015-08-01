<?php

namespace Admin\Action;

use Admin\Library\MenuLibrary;
use App\Action\AppAction;
use Twig\Library\Helper as TwigHelper;

/**
 * Index Action
 *
 * @package Admin\Action
 */
class GetMethodAction extends AppAction
{
    public function __invoke()
    {
        $template = 'master';
        $params = [];
        $args = func_get_args();

        if ($args[0] == 'bundles') {
            $this->getRouter()->setPrefix(['Admin', 'bundles']);
            TwigHelper::addMasterTwig('@Admin/master.twig');

            array_shift($args);
            $args = implode('/', $args);
            $this->forward($args);
            $params['content'] = $this->getResponse()->getContent();
        } else {
            if ($args) {
                if ($args[count($args) - 1] == 'main') {
                    $params['menu'] = MenuLibrary::generate();
                }
                $template = implode('/', $args);
            }
        }

        $this->getResponder()->setData('params', $params);
        $this->getResponder()->setData('template', $template);
    }
}
