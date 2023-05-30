<?php
namespace App\Wpcreator\Commands;

use App\Wpcreator\Services\CPT;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class CreateCpt extends Command {

    protected static $defaultName = 'createcpt';

    protected static $defaultDescription = 'WpCreator CPT Create command';

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        CPT::createCpt();
        $output->writeln("CPT feito com sucesso");

        return Command::SUCCESS;
    }
}