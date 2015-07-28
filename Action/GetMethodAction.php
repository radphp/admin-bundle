<?php

namespace Admin\Action;

use Admin\Library\MenuLibrary;
use App\Action\AppAction;

/**
 * Index Action
 *
 * @package Admin\Action
 */
class GetMethodAction extends AppAction
{
    public function __invoke()
    {
        $params = [];
        if (!func_num_args()) {
            $template = 'index';
        } else {
            $args = func_get_args();
            if($args[count($args) - 1] == 'main') {
                $params['menu'] = MenuLibrary::generate();
            }
            $template = implode('/', func_get_args());
        }

        $this->getResponder()->setData('params', $params);
        $this->getResponder()->setData('template', $template);
    }
}
