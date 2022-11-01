<?php declare(strict_types = 1);

namespace Darkling\Doctrine2Identity\Tests;

use Darkling\Doctrine2Identity\Tests\Entities\User;
use Doctrine\DBAL\Connection;
use Doctrine\ORM\EntityManager;

class DatabaseLoader
{

	/** @var bool */
	private $isDbPrepared = false;

	/** @var \Doctrine\DBAL\Connection */
	private $connection;

	/** @var \Doctrine\ORM\EntityManager */
	private $entityManager;

	public function __construct(Connection $connection, EntityManager $entityManager)
	{
		$this->connection = $connection;
		$this->entityManager = $entityManager;
	}

	public function loadUserTableWithOneItem(): void
	{
		if ($this->isDbPrepared) {
			return;
		}

		$this->connection->query('CREATE TABLE user (id INTEGER NOT NULL, name string, PRIMARY KEY(id))');

		$user = new User('John');
		$this->entityManager->persist($user);
		$this->entityManager->flush();

		$this->isDbPrepared = true;
	}

}
