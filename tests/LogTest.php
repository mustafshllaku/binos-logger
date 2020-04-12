<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use Binos\Logger\Log;
use Binos\Logger\Writer\File;

final class LogTest extends TestCase
{
	protected $file;

	public function setUp(): void
	{
		$this->file = dirname(__DIR__) . '/logs/test.log';
	}

	public function testLog()
	{
		$logger = new Log(new File($this->file));
		$this->assertInstanceOf('Binos\Logger\Log', $logger);
	}

	public function testAddWriter()
	{
		$logger = new Log();
		$logger->addWriter(new File($this->file));
		$this->assertEquals(1, count($logger->getWriters()));
	}

	public function testChangeTimestamp()
	{
		$logger = new Log();
		$logger->changeTimestamp('m-d-Y');
		$this->assertEquals('m-d-Y', $logger->getTimestamp());
	}
}