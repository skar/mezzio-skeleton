<?php
declare(strict_types=1);

namespace AppTest\Handler;

use App\Handler\Ping;
use Laminas\Diactoros\Response\JsonResponse;
use PHPUnit\Framework\TestCase;
use Psr\Http\Message\ServerRequestInterface;
use function json_decode;
use function property_exists;
use const JSON_THROW_ON_ERROR;

final class PingTest extends TestCase {
	public function testResponse(): void {
		$pingHandler = new Ping();
		$response = $pingHandler->handle(
			$this->createMock(ServerRequestInterface::class)
		);

		$json = json_decode((string)$response->getBody(), null, 512, JSON_THROW_ON_ERROR);

		self::assertInstanceOf(JsonResponse::class, $response);
		self::assertTrue(property_exists($json, 'ack') && $json->ack !== null);
	}
}
