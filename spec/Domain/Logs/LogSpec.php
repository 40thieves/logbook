<?php namespace spec\App\Domain\Logs;

use App\Domain\Logs\Log;
use DateTime;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class LogSpec extends ObjectBehavior {

	function it_can_use_fromDate_factory()
	{
		$date = new DateTime;

		$this->beConstructedThrough('fromDate', [$date]);
		$this->shouldBeAnInstanceOf(Log::class);

		$this->getDate()->shouldBe($date);
	}

	function it_can_have_region()
	{
		$this->beConstructedWith(new DateTime);

		$this->setRegion('A region');

		$this->getRegion()->shouldBe('A region');
	}

	function it_can_have_members()
	{
		$this->beConstructedWith(new DateTime);

		$this->setMembers('Me');

		$this->getMembers()->shouldBe('Me');
	}

	function it_can_have_description()
	{
		$this->beConstructedWith(new DateTime);

		$this->setDescription('A description');

		$this->getDescription()->shouldBe('A description');
	}

	function it_can_have_leader_flag()
	{
		$this->beConstructedWith(new DateTime);

		$this->setWasLeader(true);

		$this->getWasLeader()->shouldBe(true);
	}

	function it_can_have_status()
	{
		$this->beConstructedWith(new DateTime);

		$this->setStatus(1);

		$this->getStatus()->shouldBe(1);
	}

}
