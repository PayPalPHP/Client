<?php

declare(strict_types=1);

/*
 * This file is part of the Paypal API library.
 *
 * (c) Aju Chacko <ajuchacko91@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Paypal;

use Paypal\Client;

abstract class Api
{
    /**
     * Create a new API instance.
     *
     * @param Client $client
     *
     * @return void
     */
    public function __construct(Client $client)
    {
        $this->client = $client;
    }

	/**
     * @param string               $uri
     * @param array<string,mixed>  $params
     * @param array<string,string> $headers
     *
     * @return mixed
     */
    protected function get(string $uri, array $params = [], array $headers = [])
    {

    }

    /**
     * @param string               $uri
     * @param array<string,mixed>  $params
     * @param array<string,string> $headers
     * @param array<string,string> $files
     * @param array<string,mixed>  $uriParams
     *
     * @return mixed
     */
    protected function post(string $uri, array $params = [], array $headers = [], array $files = [], array $uriParams = [])
    {
        
    }

    /**
     * @param string               $uri
     * @param array<string,mixed>  $params
     * @param array<string,string> $headers
     * @param array<string,string> $files
     *
     * @return mixed
     */
    protected function put(string $uri, array $params = [], array $headers = [], array $files = [])
    {
        
    }

    /**
     * @param string               $uri
     * @param array<string,mixed>  $params
     * @param array<string,string> $headers
     *
     * @return mixed
     */
    protected function delete(string $uri, array $params = [], array $headers = [])
    {
        
    }
}