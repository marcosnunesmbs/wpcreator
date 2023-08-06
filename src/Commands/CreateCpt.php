<?php
namespace App\Wpcreator\Commands;

use App\Wpcreator\Services\CPT;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Style\SymfonyStyle;

class CreateCpt extends Command {

    protected static $defaultName = 'create:cpt';

    protected static $defaultDescription = 'WpCreator CPT Create command';

    protected function configure(): void
    {
        $this->addArgument('path', InputArgument::REQUIRED, 'The path to yaml/json/xml file.');
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);

        $CPT = new CPT($io);

        if($CPT->createCpt($input->getArgument('path')))
        {
            return Command::SUCCESS;
        }
            return Command::FAILURE;
    }
}