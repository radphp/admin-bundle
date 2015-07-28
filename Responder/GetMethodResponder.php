<?php

namespace Admin\Responder;
use App\Responder\AppResponder;

/**
 * Index Responder
 *
 * @package Admin\Responder
 */
class GetMethodResponder extends AppResponder
{
    public function __invoke()
    {
        $params = ['params' => $this->getData('params', [])];
        $template = '@Admin/' . $this->getData('template') . '.html';

        $this->setContent($template, $params);
    }
}
