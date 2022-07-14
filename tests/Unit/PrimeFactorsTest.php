<?php

beforeEach(fn () => $this->sut = new \MarcosTM\PestCodeKatas\PrimeFactors());

it('generates prime factors', function (int $number, array $expectedFactors) {
    // given

    // when
    $factors = $this->sut->generate($number);

    // then
    expect($factors)->toBeArray()
        ->toEqual($expectedFactors);
})->with([
    [1, []],
    [2, [2]],
    [3, [3]],
    [4, [2, 2]],
    [5, [5]],
    [6, [2, 3]],
    [7, [7]],
    [8, [2, 2, 2]],
    [9, [3, 3]],
    [10, [2, 5]],
    [100, [2, 2, 5, 5]]
]);