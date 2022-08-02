<?php

use MarcosTM\PestCodeKatas\RomanNumeral;

it('generates roman numerals', function (int $number, string $expected) {
    // given

    // when
    $romanNumeral = RomanNumeral::generate($number);

    // then
    expect($romanNumeral)->toEqual($expected);
})->with([
    [0, false],
    [1, 'I'],
    [2, 'II'],
    [4, 'IV'],
    [5, 'V'],
    [6, 'VI'],
    [8, 'VIII'],
    [9, 'IX'],
    [10, 'X'],
    [11, 'XI'],
    [39, 'XXXIX'],
    [40, 'XL'],
    [49, 'XLIX'],
    [50, 'L'],
    [89, 'LXXXIX'],
    [99, 'XCIX'],
    [100, 'C'],
    [499, 'CDXCIX'],
    [500, 'D'],
    [999, 'CMXCIX'],
    [1000, 'M'],
    [3999, 'MMMCMXCIX'],
    [4000, false],
]);