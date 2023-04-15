<?php

declare(strict_types=1);

namespace Paypal\Tests\Api;

use Paypal\Api\Orders;

class OrdersTest extends TestCase
{
    /**
     * @test
     */
    public function shouldGetOrdersInstance(): void
    {
        $expectedString = 'Mock_Orders_';

        $api = $this->getApiMock();

        $this->assertStringContainsString($expectedString, $api::class);
    }

    protected function getApiClass()
    {
        return Orders::class;
    }
}
