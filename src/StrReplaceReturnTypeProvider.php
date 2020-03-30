<?php
declare(strict_types=1);

/**
 * Code copied from https://github.com/vimeo/psalm/blob/b46e1477359b4d99d4c39ffac53c4958524b4f89/src/Psalm/Internal/Provider/ReturnTypeProvider/StrReplaceReturnTypeProvider.php and adapted.
 */

namespace HectorJ\SafePHPPsalmPlugin;

use Psalm\CodeLocation;
use Psalm\Context;
use Psalm\Plugin\Hook\FunctionReturnTypeProviderInterface;
use Psalm\StatementsSource;
use Psalm\Type;

final class StrReplaceReturnTypeProvider implements FunctionReturnTypeProviderInterface
{
    public static function getFunctionIds(): array
    {
        return [
            'safe\\preg_replace',
        ];
    }

    public static function getFunctionReturnType(
        StatementsSource $statements_source,
        string $function_id,
        array $call_args,
        Context $context,
        CodeLocation $code_location
    ): Type\Union
    {
        if (!$statements_source instanceof \Psalm\Internal\Analyzer\StatementsAnalyzer) {
            return Type::getMixed();
        }

        if ($subject_type = $statements_source->node_data->getType($call_args[2]->value)) {
            if (!$subject_type->hasString() && $subject_type->hasArray()) {
                return Type::getArray();
            }

            $return_type = Type::getString();

//            if (in_array($function_id, ['preg_replace', 'preg_replace_callback'], true)) { // only 1 func so we don't need this check
//                $return_type->addType(new Type\Atomic\TNull()); // \Safe\preg_replace can't return null, that's the whole point

            $codebase = $statements_source->getCodebase();

            if ($codebase->config->ignore_internal_nullable_issues) {
                $return_type->ignore_nullable_issues = true;
            }
//            }

            return $return_type;
        }

        return Type::getMixed();
    }
}