<?php

namespace App\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

class ArticleStatisticsCommand extends Command
{
    protected static $defaultName = 'app:article-statistics';
    protected static $defaultDescription = 'Add a short description for your command';

    protected function configure()
    {
        $this
            ->setDescription('Выводит статистику статьи')
            ->addArgument('slug', InputArgument::REQUIRED, 'Символьный код')
            ->addOption('format', null, InputOption::VALUE_REQUIRED, 'Формат вывода', 'text')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);
        $slug = $input->getArgument('slug');

        $data = [
            'slug' => $slug,
            'title' => ucwords(str_replace('-', ' ', $slug)),
            'like' => rand(10,100),
        ];

        switch ($input->getOption('format')) {
            case 'text':
                $io->table(array_keys($data), [$data]);
                break;
            case 'json':
                $io->write(json_encode($data));
                break;
            default:
                throw new \Exception('Незнакомый формат');

        }

        return Command::SUCCESS;
    }
}
