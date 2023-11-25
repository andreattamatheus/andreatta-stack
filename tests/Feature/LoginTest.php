<?php

it('has login page', function () {
    $response = $this->get('/login');

    $response->assertStatus(200);
});
