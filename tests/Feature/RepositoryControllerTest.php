<?php

use App\Http\Services\GitHubIntegration;
use App\Models\User;
//
//it('has repositorycontroller page', function () {
//    $response = $this->get('/app-ideas/repository');
//    $response->assertStatus(200);
//});


it('can get all repositories', function () {
    $gitHubIntegration = $this->app->make(GitHubIntegration::class);
    $response = $gitHubIntegration->getRepositories('andreattamatheus');
    $this->assertNotNull($response);
});
