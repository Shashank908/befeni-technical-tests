<?php

interface TokenizerInterface
{
    /**
     * @param string $expression
     * @param array $functionNames
     * @return array Tokens of $expression
     */
    public function tokenize(string $expression, array $functionNames = []): array;
}
