<?php

use MarcosTM\PestCodeKatas\StringCalculator;

beforeEach(fn() => StringCalculator::resetDefaultDelimiter());

it('sums the numbers in string', function (string $numbers, int $expected) {
    // given

    // when
    $sum = StringCalculator::sum($numbers);

    // then
    expect($sum)->toEqual($expected);
})->with([
    ['', 0],
    ['5', 5],
    ['5,5', 10],
    ['1,2,3,4,5,6,7,8,9,0', 45],
    ["1\n2,3;4", 10],
    ["//#\n1#2#3#4", 10],
]);

it('allows overriding default delimiter', function () {
    // given
    StringCalculator::setDefaultDelimiter('|');

    // when
    $sum = StringCalculator::sum('1|2|3|4');

    // then
    expect($sum)->toEqual(10);
});

it('throws if there is any negative number', function () {
    StringCalculator::sum('1,-1');
})->throws(Exception::class, 'Number cannot be negative.');

it('throws if there is any number greater than 1000', function () {
    StringCalculator::sum('1,1001');
})->throws(Exception::class, 'Number cannot be greater than 1000.');

it('throws if delimiter is /', function () {
    StringCalculator::sum("///\n1/2/3");
})->throws(Exception::class, 'Delimiter cannot be /.');