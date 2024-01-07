<?php

it('has url shortener page', function () {
    $response = $this->get('/app-ideas/url-shortener');
    $response->assertStatus(200);
});


class UrlShortenerTest extends TestCase
{
    /** @test */
    public function it_has_url_shortener_page()
    {
        $response = $this->get('/app-ideas/url-shortener');
        $response->assertStatus(200);
    }

    /** @test */
    public function it_can_create_a_url_shortener()
    {
        $data = [
            'url' => 'https://example.com',
            'user_id' => 1,
            'active' => true,
        ];

        $response = $this->post('/url-shorteners', $data);
        $response->assertStatus(201);

        $this->assertDatabaseHas('url_shorteners', $data);
    }

    /** @test */
    public function it_can_update_a_url_shortener()
    {
        $urlShortener = UrlShortener::factory()->create();

        $data = [
            'url' => 'https://example-updated.com',
            'user_id' => 2,
            'active' => false,
        ];

        $response = $this->put('/url-shorteners/' . $urlShortener->id, $data);
        $response->assertStatus(200);

        $this->assertDatabaseHas('url_shorteners', $data);
    }

    /** @test */
    public function it_can_delete_a_url_shortener()
    {
        $urlShortener = UrlShortener::factory()->create();

        $response = $this->delete('/url-shorteners/' . $urlShortener->id);
        $response->assertStatus(204);

        $this->assertDatabaseMissing('url_shorteners', ['id' => $urlShortener->id]);
    }
}





