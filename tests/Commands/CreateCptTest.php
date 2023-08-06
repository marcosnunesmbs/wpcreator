<?php
namespace App\Wpcreator\Tests\Commands;

use App\Wpcreator\Commands\CreateCpt;
use PHPUnit\Framework\TestCase;
use Symfony\Component\Console\Tester\CommandTester;

class CreateCptTest extends TestCase
{
    public function testItDoesNotCrash()
    {
        $command = new CreateCpt();

        $tester = new CommandTester($command);
        $tester->execute(['path' => './examples/test.json']);
        $tester->assertCommandIsSuccessful();
    }
}