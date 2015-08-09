<?php

namespace Admin\Responder;
use App\Responder\AppResponder;
use Rad\Network\Http\Response;

/**
 * Index Responder
 *
 * @package Admin\Responder
 */
class IndexResponder extends AppResponder
{
    public function __invoke()
    {
        if (($response = $this->getData('response', false)) instanceof Response) {
            return $response;
        }

        if ($template = $this->getData('template', 'index')) {
            $template = '@Admin/' . $template . '.twig';

            return $this->render($template);
        }

        return new Response();
    }
}
