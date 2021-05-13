<?php

namespace Empressia\SyliusUserbackPlugin\Controller;

use Symfony\Component\HttpFoundation\Response;

final class AccessTokenController
{
    private string $userBackAccessToken;

    public function __construct(string $userBackAccessToken)
    {
        $this->userBackAccessToken = $userBackAccessToken;
    }

    public function get(): Response
    {
        return new Response($this->userBackAccessToken);
    }
}
