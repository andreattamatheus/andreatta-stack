<?php

it('has url shortener page', function () {
    $response = $this->get('/dashboard');
    $response->assertStatus(200);
});
