<?php

namespace Gallib\ShortUrl\Parsers;

use Gallib\ShortUrl\Url;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;

class UrlParser
{
    /**
     * @var \GuzzleHttp\Client
     */
    protected $client;

    /**
     * Create a new instance.
     *
     * @param  \GuzzleHttp\Client $client
     * @return void
     */
    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    /**
     * Get body of given url.
     *
     * @param  string $url
     * @return string
     */
    public function getBody($url)
    {
        try {
            $result = $this->client->request('GET', $url);
            $body = $result->getBody();
        } catch (RequestException $exception) {
            $body = '';
        }

        return $body;
    }

    /**
     * Parse the url to collect additionnal informations.
     *
     * @param  \Gallib\ShortUrl\Url $url
     * @return void
     */
    public function setUrlInfos(Url $url)
    {
        $url->title = null;
        $url->description = null;
    }
}
