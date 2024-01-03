<?php

it('has portfolio page', function () {
    $response = $this->get('/portfolio');

    $response->assertStatus(500);
});
