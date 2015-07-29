<?php

namespace Admin\Action;

use Admin\Library\MenuLibrary;
use App\Action\AppAction;
use Rad\Routing\Middleware\DispatcherMiddleware;
use Rad\Routing\Middleware\RouterMiddleware;
use Rad\Routing\MiddlewareCollection;

/**
 * Index Action
 *
 * @package Admin\Action
 */
class GetMethodAction extends AppAction
{
    public function __invoke()
    {
        $template = 'index';
        $params = [];
        $args = func_get_args();

        if ($args[0] == 'bundles') {
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
