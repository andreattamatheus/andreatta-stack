<?php

use App\Models\User;

it('has a name attribute', function () {
    $user = new User([
        'name' => 'Matheus Andreatta',
    ]);
    expect($user->name)->toBe('Matheus Andreatta');
});

it('has a email attribute', function () {
    $user = new User([
        'email' => 'andreattamatheus25@gmail.com',
    ]);
    expect($user->email)->toBe('andreattamatheus25@gmail.com');
});

it('has a img_url attribute', function () {
    $user = new User([
        'img_url' => 'https://dev-to-uploads.s3.amazonaws.com/uploads/logos/resized_logo_UQww2soKuUsjaOGNB38o.png',
    ]);
    expect($user->img_url)->toBe('https://dev-to-uploads.s3.amazonaws.com/uploads/logos/resized_logo_UQww2soKuUsjaOGNB38o.png');
});
