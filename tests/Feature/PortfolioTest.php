<?php

it('has repository page', function () {
    $response = $this->get('/repository');

    $response->assertStatus(500);
});
