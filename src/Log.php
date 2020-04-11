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

	public function log($level, $message)
	{
		foreach($this->writers as $writer)
		{
			$writer->writeLog($level, $message);
		}

		return $this;
	}
}