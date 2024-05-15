<?php
declare(strict_types=1);

namespace AppTest\Handler;

use App\Handler\HomePage;
use App\Handler\HomePageFactory;
use AppTest\InMemoryContainer;
use Mezzio\Router\RouterInterface;
use Mezzio\Template\TemplateRendererInterface;
use PHPUnit\Framework\TestCase;

final class HomePageFactoryTest extends TestCase {
	public function testFactoryWithoutTemplate(): void {
		$container = new InMemoryContainer();
		$container->setService(RouterInterface::class, $this->createMock(RouterInterface::class));

		$factory = new HomePageFactory();
		$homePage = $factory($container);

		self::assertInstanceOf(HomePage::class, $homePage);
	}

	public function testFactoryWithTemplate(): void {
		$container = new InMemoryContainer();
		$container->setService(RouterInterface::class, $this->createMock(RouterInterface::class));
		$container->setService(TemplateRendererInterface::class, $this->createMock(TemplateRendererInterface::class));

		$factory = new HomePageFactory();
		$homePage = $factory($container);

		self::assertInstanceOf(HomePage::class, $homePage);
	}
}
