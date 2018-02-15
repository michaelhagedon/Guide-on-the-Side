<?php

namespace UALibraries\GuideOnTheSide\Proxy\Plugin;

use Proxy\Plugin\AbstractPlugin;
use Proxy\Event\ProxyEvent;

class CustomProxifyPlugin extends AbstractPlugin
{
    protected $tutorial;

    public function __construct($tutorial)
    {
        $this->tutorial = $tutorial;
    }

    public function onCompleted(ProxyEvent $event)
    {
        $response = $event['response'];

        $html = $response->getContent();

        // do your stuff here...

       $response->setContent($html);
    }
}