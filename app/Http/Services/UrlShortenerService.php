<?php

namespace App\Http\Services;

use App\Http\Repositories\UrlShortenerRepository;

class UrlShortenerService
{

    private $urlShortenerRepository;

    public function __construct(UrlShortenerRepository $urlShortenerRepository)
    {
        $this->urlShortenerRepository = $urlShortenerRepository;
    }

    /**
     * Create a new URL in the database.
     *
     * @param UrlShortenerRequest $request The request object containing the URL.
     * @return void
     */
    public function store( $request)
    {
        $url = $request->input('url');
        $shortUrl = $this->makeShortUrl();
        $userId = 1;
        $this->urlShortenerRepository->store($url, $shortUrl, $userId);
    }


    /**
     * Generates a short URL based on the current timestamp and a random string.
     *
     * @return string The generated short URL.
     */
    public function makeShortUrl() : string
    {
        $timestamp = time();
        $randomString = bin2hex(random_bytes(4));
        $uniqueUrl = $timestamp . $randomString;
        $shortUrl = base_convert($uniqueUrl, 10, 36);
        $shortUrl = str_replace(['a', 'e', 'i', 'o', 'u'], '', $shortUrl);
        $shortUrl = substr($shortUrl, 0, 15);
        return $shortUrl;
    }

}
