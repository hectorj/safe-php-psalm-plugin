<?php
declare(strict_types=1);

namespace HectorJ\SafePHPPsalmPlugin\Tests;

use PHPUnit\Framework\TestCase;

final class PluginTest extends TestCase
{
    public function test_no_error() {
        chdir(__DIR__.'/../');
        $returnCode = -1;
        $output = [];
        exec('vendor/bin/psalm -c psalm-test.xml --no-progress --no-cache --output-format=json tests/testcases/NoError.php', $output, $returnCode);
        $outputString = self::indentJson(join("\n", $output));
        self::assertEmpty($outputString, $outputString);
        self::assertEquals(0, $returnCode);
    }

    public static function indentJson(string $json): string {
        if (empty($json)) {
            return '';
        }
        return \Safe\json_encode(\Safe\json_decode($json), JSON_PRETTY_PRINT);
    }
}