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

use Paypal\HttpClient\Builder;
use Psr\Http\Client\ClientInterface;
use Http\Client\Common\HttpMethodsClientInterface;

/**
 * An API wrapper for Paypal.
 * 
 * @author Aju chacko
 */
class Client
{
    /**
     * Instantiate a new Paypal client.
     *
     * @param Builder|null $httpClientBuilder
     *
     * @return void
     */
    public function __construct(Builder $httpClientBuilder = null, string $baseUrl = null)
    {
        $this->httpClientBuilder = $builder = $httpClientBuilder ?? new Builder();
    }

    /**
     * Create a Paypal\Client using an HTTP client.
     *
     * @param ClientInterface $httpClient
     *
     * @return Client
     */
    public static function createWithHttpClient(ClientInterface $httpClient): self
    {
        $builder = new Builder($httpClient);

        return new self($builder);
    }

    /**
     * Get the HTTP client.
     *
     * @return HttpMethodsClientInterface
     */
    public function getHttpClient(): HttpMethodsClientInterface
    {
        return $this->getHttpClientBuilder()->getHttpClient();
    }

    /**
     * Get the HTTP client builder.
     *
     * @return Builder
     */
    protected function getHttpClientBuilder(): Builder
    {
        return $this->httpClientBuilder;
    }
}