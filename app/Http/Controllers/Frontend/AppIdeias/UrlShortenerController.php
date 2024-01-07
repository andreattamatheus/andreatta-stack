<?php

namespace App\Http\Controllers\Frontend\AppIdeias;

use App\Http\Controllers\Controller;
use App\Http\Requests\UrlShortenerRequest;
use App\Http\Services\UrlShortenerService;
use App\Http\Repositories\UrlShortenerRepository;
use Illuminate\Http\Request;

class UrlShortenerController extends Controller
{
    private $urlShortenerService;
    private $urlShortenerRepository;

    /**
     * Class UrlShortenerController
     *
     * This class is responsible for handling URL shortening functionality.
     */
    public function __construct(
        UrlShortenerService $urlShortenerService,
        UrlShortenerRepository $urlShortenerRepository
    ) {
        $this->urlShortenerService = $urlShortenerService;
        $this->urlShortenerRepository = $urlShortenerRepository;
    }

    /**
     * Display the index page of the URL shortener.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function index()
    {
        $urls = $this->urlShortenerRepository->getAll();
        return view('pages.dashboard.url-shortener.index', compact('urls'));
    }

    /**
     * Store a new URL in the database and generate a short URL.
     *
     * @param UrlShortenerRequest $request The request object containing the URL.
     * @return void
     */

    public function store(UrlShortenerRequest $request)
    {
        try {
            $this->urlShortenerService->store($request);
            return redirect()->route('url-shortener.index')->with('success', 'URL created successfully.');
        } catch (\Exception $e) {
            \Log::alert($e->getMessage());
            return redirect()->route('url-shortener.index')->with('error', 'An error occurred while creating the URL.');
        }
    }

    public function destroy(Request $request)
    {
        try {
            $this->urlShortenerRepository->destroy($request->input('id'));
            return redirect()->route('url-shortener.index')->with('success', 'URL deleted successfully.');
        } catch (\Exception $e) {
            \Log::alert($e->getMessage());
            return redirect()->route('url-shortener.index')->with('error', 'An error occurred while deleting the URL.');
        }
    }

    /**
     * Redirect the user to the original URL.
     *
     * @param string $shortUrl The short URL.
     * @return \Illuminate\Http\RedirectResponse
     */
    public function redirect(string $shortUrl)
    {
        $getUrl = $this->urlShortenerRepository->getByShortUrl($shortUrl);
        if (!$getUrl) {
            return view('pages.404-page');
        }
        return redirect()->away($getUrl->url);
    }
}
