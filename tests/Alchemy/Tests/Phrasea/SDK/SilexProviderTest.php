<?php

namespace Alchemy\Tests\Phrasea\SDK;

use Alchemy\Phrasea\SDK\PhraseanetSDKServiceProvider;
use Monolog\Handler\StreamHandler;
use Silex\Application;
use Silex\Provider\MonologServiceProvider;

class SilexProviderTest extends \PHPUnit_Framework_TestCase
{
    public function testInitialize()
    {
        $app = $this->getConfiguredApplication();
        $app->register(new PhraseanetSDKServiceProvider());

    	$this->assertInstanceOf('PhraseanetSDK\Client', $app['phraseanet-sdk']);
    }

    private function getConfiguredApplication()
    {
        $app = new Application();

        $app['phraseanet-sdk.apiKey'] = 'sdfmqlsdkfm';
        $app['phraseanet-sdk.apiSecret'] = 'eoieep';
        $app['phraseanet-sdk.apiUrl'] = 'https://bidule.net';

        $app->register(new MonologServiceProvider());
        $app['monolog.handler'] = new StreamHandler('php://stdout');

        return $app;
    }
}
