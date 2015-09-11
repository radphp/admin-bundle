<?php

namespace Admin;

use Rad\Configure\Config;
use Rad\Core\AbstractBundle;

/**
 * Admin Bundle
 *
 * @package Admin
 */
class AdminBundle extends AbstractBundle
{
    /**
     * {@inheritdoc}
     */
    public function loadConfig()
    {
        Config::load(__DIR__ . DS . 'Resource' . DS . 'config' . DS . 'config.php');
    }
}
