<?php

namespace NetCamerond\Framework\Services;

class InputEchoer
{
    /**
     * @param array<string> $argv
     */
    public function __construct(
        protected array $argv,
        protected array $serverArgs,
    ) {
    }

    public function echoConsoleInput(): void
    {
        echo 'The command was:' . PHP_EOL;
        echo 'php ' . implode(' ', $this->argv) . PHP_EOL;
    }

    public function echoWebPath(): void
    {
        echo 'The path was: ' . $_SERVER["PATH_INFO"];
    }
}
