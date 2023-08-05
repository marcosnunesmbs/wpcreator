<?php

use App\Wpcreator\Commands\Test;
use PHPUnit\Framework\TestCase;
use Symfony\Component\Console\Tester\CommandTester;

require_once './vendor/autoload.php';

class TestTest extends TestCase
{
    public function testItDoesNotCrash()
    {
        $command = new Test();

        $tester = new CommandTester($command);
        $tester->execute([]);

        $tester->assertCommandIsSuccessful();
    }
}