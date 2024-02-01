<?php

it('has podcast library page', function () {
    $response = $this->get('/app-ideas/podcast-library');
    $response->assertStatus(200);
});
