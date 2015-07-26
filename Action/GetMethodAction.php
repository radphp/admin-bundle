<?php

namespace Admin\Action;

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
        if (!func_num_args()) {
            $template = SRC_DIR . '/Admin/Resource/template/index.html';
        } else {
            $template = implode('/', func_get_args());
            $template = SRC_DIR . "/Admin/Resource/template/$template.html";
        }

        echo file_get_contents($template);
    }
}
