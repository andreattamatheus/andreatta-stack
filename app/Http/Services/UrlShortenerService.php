<?php

namespace App\Http\Services;

use App\Http\Repositories\UrlShortenerRepository;
use App\Http\Requests\UrlShortenerRequest;
use App\Models\UrlShortener;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Random\RandomException;

class UrlShortenerService
{
    /**
     * Create a new UrlShortenerService instance.
     *
     * @param  UrlShortenerRepository  $urlShortenerRepository  The repository for the URL shortener.
     * @return void
     */
    public function __construct(
        private UrlShortenerRepository $urlShortenerRepository
    )
    {
    }

    /**
     * Create a new URL in the database.
     *
     * @param UrlShortenerRequest $request  The request object containing the URL.
     * @return UrlShortener The created URL.
     */
    public function store(UrlShortenerRequest $request): UrlShortener
    {
        try {
            DB::beginTransaction();
                $url = $request->input('url');
                $shortUrl = $this->makeShortUrl();
                $userId = User::where('email', config('app.admin_email'))->first()->id;
                $urlShortener = $this->urlShortenerRepository->store($url, $shortUrl, $userId);
            DB::commit();
            return $urlShortener;
        } catch (\Exception $e) {
            \Log::alert($e);
            DB::rollBack();
            throw $e;
        }
    }

    /**
     * Generates a short URL based on the current timestamp and a random string.
     *
     * @return string The generated short URL.
     * @throws RandomException
     */
    public function makeShortUrl(): string
    {
        $timestamp = time();
        $randomString = bin2hex(random_bytes(4));
        $uniqueUrl = $timestamp.$randomString;
        $shortUrl = base_convert($uniqueUrl, 10, 36);
        $shortUrl = str_replace(['a', 'e', 'i', 'o', 'u'], '', $shortUrl);
        return substr($shortUrl, 0, 15);
    }
}
