<?php

namespace Binos\Logger\Writer;

interface IWriter
{
	/**
	 * Write to the log.
	 *
	 * @param mixed $level
	 * @param string $message
	 * @param mixed $datetime
	 * @return IWriter
	 */
	public function writeLog($level, $message, $datetime);
}