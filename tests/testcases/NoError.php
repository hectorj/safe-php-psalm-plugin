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

/**
 * @psalm-return int
 */
function preg_match()
{
    return \Safe\preg_match('#(a)#', 'a', $matches);
}

/**
 * @psalm-return string
 */
function preg_match_matches()
{
    \Safe\preg_match('#(a)#', 'a', $matches);

    return $matches[1];
}
