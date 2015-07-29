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
        if ($template = $this->getData('template', 'index')) {
            $params = ['params' => $this->getData('params', [])];
            $template = '@Admin/' . $template . '.html';

            $this->setContent($template, $params);
        }
    }
}
