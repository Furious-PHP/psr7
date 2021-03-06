<?php

declare(strict_types=1);

namespace tests\Furious\Psr7\Response;

use Furious\Psr7\Response\JsonResponse;
use PHPUnit\Framework\TestCase;

class JsonResponseTest extends TestCase
{
    public function testCreate(): void
    {
        $response = new JsonResponse([
            'a' => 'b'
        ]);
        $this->assertEquals('{"a":"b"}', (string) $response->getBody());
        $this->assertEquals($response->getHeaderLine( 'Content-Type'), 'application/json');
    }
}