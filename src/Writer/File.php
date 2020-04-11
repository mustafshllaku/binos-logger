<?php

namespace Binos\Logger\Writer;

class File implements IWriter
{
	protected $file;

	protected $fileType;

	public function __construct($file)
	{
		if (! file_exists($file)) {
			touch($file);
		}

		$this->file = $file;
		$this->fileType = isset(pathinfo($this->file)['extension']) ? pathinfo($this->file)['extension'] : null;
	}

	public function writeLog($level, $message, $datetime)
	{
		switch (strtolower($this->fileType)) {
			case 'json' :
				break;
			default:
				$log = $datetime . "\t" . "[" . $level . "]" . "\t" . $message . PHP_EOL;
				file_put_contents($this->file, $log);
		}

		return $this;
	}
}