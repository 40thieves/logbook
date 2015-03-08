<?php namespace spec\App\Handlers\Commands;

use App\Commands\CreateLog;
use App\Domain\Logs\Log;
use App\Domain\Logs\LogRepository;
use DateTime;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class CreateLogHandlerSpec extends ObjectBehavior
{
    function it_creates_a_log(LogRepository $repo)
    {
        $repo->commit()->shouldBeCalled();

        $log = $this->handle(new CreateLog(
            new DateTime(),
            'Snowdonia',
            'Me',
            'Description of some walking',
            true,
            1
        ));

        $log->shouldBeAnInstanceOf(Log::class);
    }
}
