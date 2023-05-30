<?php
namespace App\Wpcreator\Commands;

use App\Wpcreator\Services\Widgets;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class CreateWidget extends Command {

    protected static $defaultName = 'cretewidget';

    protected static $defaultDescription = 'WpCreator Elementor Widget Create command';

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        Widgets::createWidget();
        $output->writeln("Widget feito com sucesso");

        return Command::SUCCESS;
    }
}