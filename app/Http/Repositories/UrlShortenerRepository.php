<?php

namespace App\Http\Repositories;

use App\Http\Interfaces\UrlShortenerInterface;
use App\Models\UrlShortener;
use Psy\Exception\ThrowUpException;

class UrlShortenerRepository implements UrlShortenerInterface
{
    private $model = UrlShortener::class;

    public function getAll()
    {
        try {
            return $this->model::all()->sortByDesc('created_at');
        } catch (\Exception $e) {
            \Log::alert($e->getMessage());
            return [];
        }
    }

    public function getByShortUrl(string $shortUrl)
    {
        return $this->model::where('short_url', $shortUrl)->first();
    }

    public function store(string $url, string $shortUrl, int $userId)
    {
        return $this->model::create([
            'url' => $url,
            'short_url' => $shortUrl,
            'user_id' => $userId,
        ]);
    }

    public function destroy(int $id)
    {
        return $this->model::destroy($id);
    }
}
