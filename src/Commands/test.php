<?php
namespace App\Wpcreator\Commands;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class Test extends Command {

    protected static $defaultName = 'test';

    protected static $defaultDescription = 'Testando CLI WpCreator';

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $output->writeln("Teste feito com sucesso");

        return Command::SUCCESS;
    }

}