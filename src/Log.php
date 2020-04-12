<?php

namespace Binos\Logger;

use Binos\Logger\Writer\IWriter;

class Log
{
	/**
	 * Log levels
	 */
	const ALERT 	= 0;
	const ERROR 	= 1;
	const INFO 		= 2;
	const NOTICE 	= 3;
	const DEBUG 	= 4;

	protected $levels = [
		0	=>	'ALERT',
		1	=>	'ERROR',
		2	=>	'INFO',
		3	=>	'NOTICE',
		4	=>	'DEBUG'
	];

	/**
	 * Log writers
	 *
	 * @var array
	 */
	protected $writers = [];

	/**
	 * Log timestamp format
	 *
	 * @var string
	 */
	protected $timestamp = 'Y-m-d H:i:s';

	public function __construct($writer = null)
	{
		if(null !== $writer)
		{
			$this->addWriter($writer);
		}
	}

	public function addWriter(IWriter $writer)
	{
		$this->writers[] = $writer;
		return $this;
	}

	public function getWriters()
	{
		return $this->writers;
	}

	public function getTimestamp()
	{
		return $this->timestamp;
	}

	public function changeTimestamp(string $timestamp)
	{
		$this->timestamp = $timestamp;
	}

	public function alert($message)
	{
		return $this->log(self::ALERT, $message);
	}

	public function error($message)
	{
		return $this->log(self::ERROR, $message);
	}

	public function info($message)
	{
		return $this->log(self::INFO, $message);
	}

	public function notice($message)
	{
		return $this->log(self::NOTICE, $message);
	}

	public function debug($message)
	{
		return $this->log(self::DEBUG, $message);
	}

	public function log($level, $message)
	{
		foreach($this->writers as $writer)
		{
			$writer->writeLog($this->levels[$level], $message, date($this->timestamp));
		}

		return $this;
	}
}