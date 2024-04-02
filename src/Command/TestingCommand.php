<?php

namespace Unmainsys\HealthKick\Command;

use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Mercure\HubInterface;
use Symfony\Component\Mercure\Update;

#[AsCommand(name: 'dev:testing')]
class TestingCommand extends Command
{
    public function __construct(private readonly HubInterface $hub)
    {
        parent::__construct();
    }

    /**
     * @throws \JsonException
     */
    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $update = new Update(
        //topics:'http://hk.local:81/demo/books/321',
            topics: 'this-can-be-anything-but-usually-is-an-IRI',
            data: json_encode([
                'status' => 'OutOfStock',
                'data' => date('Y-m-d H:i:s'),
                'U' => date('U'),
            ], JSON_THROW_ON_ERROR),
            // private: true,
            // type: 'what-is-this-about',
            retry: 3
        );
        $this->hub->publish($update);

        return Command::SUCCESS;
    }
}