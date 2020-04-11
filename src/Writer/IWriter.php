<?php

namespace Binos\Logger\Writer;

interface IWriter
{
	/**
	 * Write to the log.
	 *
	 * @param mixed $level
	 * @param string $message
	 * @return IWriter
	 */
	public function writeLog($level, $message);
}