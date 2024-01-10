<?php

it('has url shortener page', function () {
    $response = $this->get('/app-ideas/url-shortener');
    $response->assertStatus(500);
});
