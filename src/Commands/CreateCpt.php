<?php
namespace App\Wpcreator\Commands;

use App\Wpcreator\Services\CPT;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputArgument;

class CreateCpt extends Command {

    protected static $defaultName = 'createcpt';

    protected static $defaultDescription = 'WpCreator CPT Create command';

    protected function configure(): void
{
    $this->addArgument('yaml', InputArgument::REQUIRED, 'The path to yaml file.');
}

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        if(CPT::createCpt($input->getArgument('yaml')))
        {
            return Command::SUCCESS;
        }
            return Command::FAILURE;
    }
}