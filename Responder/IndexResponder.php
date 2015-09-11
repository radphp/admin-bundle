<?php

namespace Admin\Responder;
use App\Responder\AppResponder;
use Rad\Network\Http\Response;
use Twig\Library\TwigResponse;

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

            return new TwigResponse($template);
        }

        return new Response();
    }
}
