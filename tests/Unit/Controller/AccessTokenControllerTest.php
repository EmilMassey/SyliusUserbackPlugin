<?php

namespace Tests\Empressia\SyliusUserbackPlugin\Unit\Controller;

use Empressia\SyliusUserbackPlugin\Controller\AccessTokenController;
use PHPUnit\Framework\TestCase;

/** @covers \Empressia\SyliusUserbackPlugin\Controller\AccessTokenController */
class AccessTokenControllerTest extends TestCase
{
    public function testReturnsToken()
    {
        $controller = new AccessTokenController('lorem_ipsum');

        $this->assertSame('lorem_ipsum', $controller->get()->getContent());
    }
}
