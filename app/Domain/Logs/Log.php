<?php namespace App\Domain\Logs;

use DateTime;

class Log {

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
	 * @var bool
	 */
	private $wasLeader;

	/**
	 * @var int
	 */
	private $status;

	public function __construct(DateTime $date)
	{
		$this->date = $date;
	}

	/**
	 * @param DateTime $date
	 * @return Log
	 */
	public static function fromDate(DateTime $date)
	{
		return new Log($date);
	}

	/**
	 * @return DateTime
	 */
	public function getDate()
	{
		return $this->date;
	}

	/**
	 * @param $region
	 */
	public function setRegion($region)
    {
		$this->region = $region;
    }

	/**
	 * @return string
	 */
	public function getRegion()
    {
        return $this->region;
    }

	/**
	 * @param $members
	 */
	public function setMembers($members)
    {
		$this->members = $members;
    }

	/**
	 * @return string
	 */
	public function getMembers()
    {
        return $this->members;
    }

    public function setDescription($description)
    {
		$this->description = $description;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function setWasLeader($wasLeader)
    {
		$this->wasLeader = $wasLeader;
    }

    public function getWasLeader()
    {
        return $this->wasLeader;
    }

    public function setStatus($status)
    {
		$this->status = $status;
    }

    public function getStatus()
    {
        return $this->status;
    }
}
