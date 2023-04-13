<?php

namespace Paypal\HttpClient;

use Http\Discovery\Psr18ClientDiscovery;
use Http\Discovery\Psr17FactoryDiscovery;
use Http\Client\Common\HttpMethodsClient;
use Http\Client\Common\PluginClientFactory;
use Http\Client\Common\HttpMethodsClientInterface;

final class Builder
{
	/**
     * Registered plugins.
     *
     * @var Plugin[]
     */
    private $plugins = [];

    /**
     * The cache plugin to use.
     *
     * This plugin is specially treated because it has to be the very last plugin.
     *
     * @var CachePlugin|null
     */
    private $cachePlugin;

    /**
     * A HTTP client with all our plugins.
     *
     * @var HttpMethodsClientInterface|null
     */
    private $pluginClient;

    /**
     * Create a new http client builder instance.
     *
     * @param ClientInterface|null         $httpClient
     * @param RequestFactoryInterface|null $requestFactory
     * @param StreamFactoryInterface|null  $streamFactory
     * @param UriFactoryInterface|null     $uriFactory
     *
     * @return void
     */
	public function __construct(
        ClientInterface $httpClient = null,
        RequestFactoryInterface $requestFactory = null,
        StreamFactoryInterface $streamFactory = null,
        UriFactoryInterface $uriFactory = null
    ) {
        $this->httpClient = $httpClient ?? Psr18ClientDiscovery::find();
        $this->requestFactory = $requestFactory ?? Psr17FactoryDiscovery::findRequestFactory();
        $this->streamFactory = $streamFactory ?? Psr17FactoryDiscovery::findStreamFactory();
        $this->uriFactory = $uriFactory ?? Psr17FactoryDiscovery::findUriFactory();
    }

    /**
     * @return HttpMethodsClientInterface
     */
    public function getHttpClient(): HttpMethodsClientInterface
    {
        if (null === $this->pluginClient) {
            $plugins = $this->plugins;
            if (null !== $this->cachePlugin) {
                $plugins[] = $this->cachePlugin;
            }

            $this->pluginClient = new HttpMethodsClient(
                (new PluginClientFactory())->createClient($this->httpClient, $plugins),
                $this->requestFactory,
                $this->streamFactory
            );
        }

        return $this->pluginClient;
    }
}