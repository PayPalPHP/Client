<?php

declare(strict_types=1);

namespace Paypal\Tests\Api;

use Paypal\Client;
use PHPUnit\Framework\TestCase as PhpUnit;
use Psr\Http\Client\ClientInterface;

abstract class TestCase extends PhpUnit
{
    /**
     * @return string
     */
    abstract protected function getApiClass();

    /**
     * @param array $methods
     *
     * @return \PHPUnit\Framework\MockObject\MockObject
     */
    protected function getApiMock(array $methods = [])
    {
        $httpClient = $this->getMockBuilder(ClientInterface::class)
            ->onlyMethods(['sendRequest'])
            ->getMock();
        $httpClient
            ->expects($this->any())
            ->method('sendRequest');

        $client = Client::createWithHttpClient($httpClient);

        return $this->getMockBuilder($this->getApiClass())
            ->onlyMethods(\array_merge(['get', 'post', 'delete', 'put'], $methods))
            ->setConstructorArgs([$client, null])
            ->getMock();
    }
}
