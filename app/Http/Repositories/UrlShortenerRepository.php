<?php

namespace App\Http\Repositories;

use App\Http\Interfaces\UrlShortenerInterface;
use App\Models\UrlShortener;

class UrlShortenerRepository implements UrlShortenerInterface
{
    private $model =  UrlShortener::class;

    public function getAll()
    {
        return $this->model::all()->sortByDesc('created_at');
    }

    public function getByShortUrl(string $shortUrl)
    {
        return $this->model::where('short_url', $shortUrl)->first();
    }

    public function store(string $url, string $shortUrl, int $userId)
    {
        $this->model::create([
            'url' => $url,
            'short_url' => $shortUrl,
            'user_id' => $userId
        ]);
    }

    public function destroy(int $id)
    {
        $this->model::destroy($id);
    }
}
