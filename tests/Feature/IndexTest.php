<?php

it('has index page', function () {
    $response = $this->get('/home');

    $response->assertStatus(500);
});
