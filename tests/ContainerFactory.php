<?php declare(strict_types = 1);

namespace Darkling\Doctrine2Identity\Tests;

use Nette\Configurator;
use Nette\DI\Container;

class ContainerFactory
{

	public function create(): Container
	{
		$configurator = new Configurator();
		$configurator->setTempDirectory(TEMP_DIR);
		$configurator->addConfig(__DIR__ . '/config/default.neon');
		return $configurator->createContainer();
	}

}
