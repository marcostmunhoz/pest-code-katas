<?php

namespace MarcosTM\PestCodeKatas;

use Exception;

class StringCalculator
{
    private const DEFAULT_DELIMITER = ',|;|\n';
    private const MAX_NUMBER_ALLOWED = 1000;
    private const CUSTOM_DELIMITER_REGEX = '/\/\/(.)\n/';

    private static string $currentDefaultDelimiter = self::DEFAULT_DELIMITER;

    public static function setDefaultDelimiter(string $delimiter): void
    {
        self::validateDelimiter($delimiter);

        self::$currentDefaultDelimiter = preg_quote($delimiter, '/');
    }

    private static function validateDelimiter(string $delimiter): void
    {
        if (!$delimiter || strlen($delimiter) > 1) {
            throw new Exception('A single character delimiter is required.');
        }

        if ($delimiter === '/') {
            throw new Exception('Delimiter cannot be /.');
        }
    }

    public static function resetDefaultDelimiter(): void
    {
        self::$currentDefaultDelimiter = self::DEFAULT_DELIMITER;
    }

    public static function sum(string $expression): int
    {
        if (!$expression) {
            return 0;
        }

        $numbers = self::parseExpression($expression);
        $sum = 0;

        foreach ($numbers as $number) {
            self::validateNumber($number);

            $sum += $number;
        }

        return $sum;
    }

    public static function parseExpression(string $expression): array
    {
        $delimiter = self::$currentDefaultDelimiter;

        if (preg_match(self::CUSTOM_DELIMITER_REGEX, $expression, $matches)) {
            self::validateDelimiter($matches[1]);

            $delimiter = preg_quote($matches[1], '/');

            $expression = str_replace($matches[0], '', $expression);
        }

        return preg_split("/{$delimiter}/", $expression);
    }

    private static function validateNumber(int $number): void
    {
        if ($number < 0) {
            throw new Exception('Number cannot be negative.');
        }

        if ($number > self::MAX_NUMBER_ALLOWED) {
            throw new Exception('Number cannot be greater than 1000.');
        }
    }
}