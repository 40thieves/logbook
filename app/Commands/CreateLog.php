<?php namespace App\Commands;

use DateTime;

class CreateLog extends Command {

	/**
	 * @var DateTime
	 */
	private $date;

	/**
	 * @var string
	 */
	private $region;

	/**
	 * @var string
	 */
	private $members;

	/**
	 * @var string
	 */
	private $description;

	/**
	 * @var boolean
	 */
	private $wasLeader;

	/**
	 * @var int
	 */
	private $status;

	/**
	 * Create a new command instance.
	 */
	public function __construct(DateTime $date, $region, $members, $description, $wasLeader, $status)
	{
		$this->date = $date;
		$this->region = $region;
		$this->members = $members;
		$this->description = $description;
		$this->wasLeader = $wasLeader;
		$this->status = $status;
	}

}
