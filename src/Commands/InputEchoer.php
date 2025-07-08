<?php

namespace NetCamerond\Framework\Commands;

class InputEchoer
{
    /**
     * @param array<string> $argv
     */
    public function __construct(
        protected array $argv,
    ) {
    }

    public function echoInput(): void
    {
        echo 'The command was:' . PHP_EOL;
        echo 'php ' . implode(' ', $this->argv) . PHP_EOL;
    }
}
