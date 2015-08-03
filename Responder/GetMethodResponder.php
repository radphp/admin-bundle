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
        if ($this->getResponse()->getContent()) {
            return;
        }

        if ($template = $this->getData('template', 'index')) {
            $params = $this->getData('params', []);
            $template = '@Admin/' . $template . '.twig';

            $this->setContent($template, $params);
        }
    }
}
