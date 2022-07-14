<?php

namespace MarcosTM\PestCodeKatas;

class PrimeFactors
{
    /**
     * @return int[]
     */
    public function generate(int $number): array
    {
        $factors = [];
        $divisor = 2;

        while ($divisor <= $number) {
            while ($number % $divisor === 0) {
                $factors[] = $divisor;

                $number /= $divisor;
            }

            $divisor++;
        }

        return $factors;
    }
}