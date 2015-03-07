<?php namespace App\Infrastructure\Logs;

use App\Domain\Logs\LogRepository;
use Illuminate\Database\Capsule\Manager;

class LogDbRepository implements LogRepository {

	/**
	 * @var Manager
	 */
	private $database;

	public function __construct(Manager $database)
	{
		$this->database = $database;
	}

}