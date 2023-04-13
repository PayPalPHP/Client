<?php

declare(strict_types=1);

namespace Paypal\Tests;

use Paypal\Client;
use PHPUnit\Framework\TestCase;
use Http\Client\Common\HttpMethodsClientInterface;

class ClientTest extends Testcase
{
	public function testCreateClient(): void
    {
        $client = new Client();

        $this->assertInstanceOf(Client::class, $client);
        $this->assertInstanceOf(HttpMethodsClientInterface::class, $client->getHttpClient());
    }
}