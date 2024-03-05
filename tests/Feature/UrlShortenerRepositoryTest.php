<?php

use App\Http\Repositories\UrlShortenerRepository;
use App\Models\User;

//it('has url shortener page', function () {
//    $response = $this->get('/app-ideas/url-shortener');
//    $response->assertStatus(200);
//});

it('can create a new URL', function () {
    $user = User::factory()->create();
    $urlShortenerRepository = $this->app->make(UrlShortenerRepository::class);
    $urlToBeCreated = [
        'url' => 'https://www.google.com',
        'short_url' => 'short-url',
        'user_id' => $user->id,
    ];

    $urlShortenerRepository->store(
        $urlToBeCreated['url'],
        $urlToBeCreated['short_url'],
        $urlToBeCreated['user_id']);

    $this->assertDatabaseHas('url_shorteners', ['url' => 'https://www.google.com']);
});

it('can delete a URL', function () {
    $user = User::factory()->create();
    $urlShortenerRepository = $this->app->make(UrlShortenerRepository::class);
    $urlToBeDeleted = [
        'url' => 'https://www.google.com',
        'short_url' => 'short-url',
        'user_id' => $user->id,
    ];

    $urlCreated = $urlShortenerRepository->store(
        $urlToBeDeleted['url'],
        $urlToBeDeleted['short_url'],
        $urlToBeDeleted['user_id']);

    $urlShortenerRepository->destroy($urlCreated->id);

    $this->assertDatabaseMissing('url_shorteners', ['id' => $urlCreated->id, 'deleted_at' => null]);
});


it('can get all URLs', function () {
    $urlShortenerRepository = $this->app->make(UrlShortenerRepository::class);
    $user = User::factory()->create();

    $urlShortenerRepository->store('https://www.google.com', 'short-url', $user->id);
    $urlShortenerRepository->store('https://www.facebook.com', 'short-url-2', $user->id);
    $urlShortenerRepository->store('https://www.twitter.com', 'short-url-3', $user->id);

    $this->assertCount(3, $urlShortenerRepository->getAll());
});

it('can get a URL by short URL', function () {
    $urlShortenerRepository = $this->app->make(UrlShortenerRepository::class);
    $user = User::factory()->create();

    $urlShortenerRepository->store('https://www.google.com', 'short-url', $user->id);
    $urlShortenerRepository->store('https://www.facebook.com', 'short-url-2', $user->id);
    $urlShortenerRepository->store('https://www.twitter.com', 'short-url-3', $user->id);

    $this->assertNotNull($urlShortenerRepository->getByShortUrl('short-url'));
    $this->assertNotNull($urlShortenerRepository->getByShortUrl('short-url-2'));
    $this->assertNotNull($urlShortenerRepository->getByShortUrl('short-url-3'));
});
