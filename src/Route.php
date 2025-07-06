<?php

namespace NetCamerond\Funwork;

class Route
{
    /**
     * @param array<string> $regexExamples
     */
    public function __construct(
        protected string $regex,
        protected string $serviceClassName,
        protected string $serviceMethodName,
        protected array $regexExamples,
    ) {
    }

    public function getRegex(): string
    {
        return $this->regex;
    }

    public function getServiceClassName(): string
    {
        return $this->serviceClassName;
    }

    public function getServiceMethodName(): string
    {
        return $this->serviceMethodName;
    }

    /**
     * @return array<string>
     */
    public function getRegexExamples(): array
    {
        return $this->regexExamples;
    }
}
