<?php
declare(strict_types=1);

namespace HectorJ\SafePHPPsalmPlugin\Tests\testcases;

/**
 * @psalm-return array<string, int>
 */
function array_combine() {
    return \Safe\array_combine(['a'], [1]);
}

/**
 * @psalm-return array<string, int>
 */
function array_flip() {
    return \Safe\array_flip([1 => 'a']);
}

/**
 * @psalm-return list<string>
 */
function shuffle() {
    $array = ['a' => 'b', 'c' => 'd'];
    \Safe\shuffle($array);
    return $array;
}

/**
 * @psalm-return list<string>
 */
function sort() {
    $array = ['a' => 'b', 'c' => 'd'];
    \Safe\sort($array);
    return $array;
}

/**
 * @psalm-return list<string>
 */
function rsort() {
    $array = ['a' => 'b', 'c' => 'd'];
    \Safe\rsort($array);
    return $array;
}

/**
 * @psalm-return list<string>
 */
function usort() {
    $array = ['a' => 'b', 'c' => 'd'];
    \Safe\usort($array, fn(string $a, string $b) => strcmp($a, $b));
    return $array;
}

/**
 * @psalm-return array<string, string>
 */
function uasort() {
    /** @psam-var array<string, string> $array */
    $array = ['a' => 'b', 'c' => 'd'];
    \Safe\uasort($array, fn(string $a, string $b) => strcmp($a, $b));
    return $array;
}

/**
 * @psalm-return array<string, string>
 */
function uksort() {
    $array = ['a' => 'b', 'c' => 'd'];
    \Safe\uksort($array, fn(string $a, string $b) => strcmp($a, $b));
    return $array;
}

/**
 * @psalm-return closed-resource
 */
function fclose()
{
    $handle = \Safe\fopen('whatever', 'r');
    \Safe\fclose($handle);
    return $handle;
}

/**
 * @psalm-pure
 */
function preg_match_all_no_flag(): array
{
    if (\Safe\preg_match_all('#a#', 'a', $matches) === 0) {
        return [];
    }

    return $matches;
}

/**
 * @psalm-pure
 * @psalm-return array<list<string>>
 */
function preg_match_all_flag1(): array
{
    if (\Safe\preg_match_all('#a#', 'a', $matches, PREG_PATTERN_ORDER) === 0) {
        return $matches;
    }

    return $matches;
}

/**
 * @psalm-pure
 * @psalm-return list<array<string>>
 */
function preg_match_all_flag2(): array
{
    if (\Safe\preg_match_all('#a#', 'a', $matches, PREG_SET_ORDER) === 0) {
        return $matches;
    }

    return $matches;
}

/**
 * @psalm-pure
 * @psalm-return array<list<array{string, int}>>
 */
function preg_match_all_flag257(): array
{
    if (\Safe\preg_match_all('#a#', 'a', $matches, PREG_OFFSET_CAPTURE|PREG_PATTERN_ORDER) === 0) {
        return $matches;
    }

    return $matches;
}

/**
 * @psalm-pure
 * @psalm-return list<array<array{string, int}>>
 */
function preg_match_all_flag258(): array
{
    if (\Safe\preg_match_all('#a#', 'a', $matches, PREG_OFFSET_CAPTURE|PREG_SET_ORDER) === 0) {
        return $matches;
    }

    return $matches;
}

/**
 * @psalm-pure
 * @psalm-return array<list<?string>>
 */
function preg_match_all_flag512(): array
{
    if (\Safe\preg_match_all('#a#', 'a', $matches, PREG_UNMATCHED_AS_NULL) === 0) {
        return $matches;
    }

    return $matches;
}

/**
 * @psalm-pure
 * @psalm-return array<list<?string>>
 */
function preg_match_all_flag513(): array
{
    if (\Safe\preg_match_all('#a#', 'a', $matches, PREG_UNMATCHED_AS_NULL|PREG_PATTERN_ORDER) === 0) {
        return $matches;
    }

    return $matches;
}

/**
 * @psalm-pure
 * @psalm-return list<array<?string>>
 */
function preg_match_all_flag514(): array
{
    if (\Safe\preg_match_all('#a#', 'a', $matches, PREG_UNMATCHED_AS_NULL|PREG_SET_ORDER) === 0) {
        return $matches;
    }

    return $matches;
}

/**
 * @psalm-pure
 * @psalm-return list<array<array{?string, int}>>
 */
function preg_match_all_flag770(): array
{
    if (\Safe\preg_match_all('#a#', 'a', $matches, PREG_UNMATCHED_AS_NULL|PREG_OFFSET_CAPTURE|PREG_SET_ORDER) === 0) {
        return $matches;
    }

    return $matches;
}

/**
 * @psalm-return array
 */
function preg_replace_array()
{
    return \Safe\preg_replace('#a#', 'b', ['a', 'b']);
}

/**
 * @psalm-return string
 */
function preg_replace_string()
{
    return \Safe\preg_replace('#a#', 'b', 'aba');
}
