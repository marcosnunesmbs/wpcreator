<?php
namespace App\Wpcreator\Commands;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

class Test extends Command {

    protected static $defaultName = 'test';

    protected static $defaultDescription = 'Testando CLI WpCreator';

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);

        $io->success("Teste feito com sucesso");

        return Command::SUCCESS;
    }

}