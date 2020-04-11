<?php

namespace Binos\Logger\Writer;

class File implements IWriter
{
	protected $file;

	public function __construct($file)
	{
		if (! file_exists($file)) {
			touch($file);
		}
	}

	public function writeLog($level, $message)
	{

	}
}