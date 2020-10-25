<?php

namespace HectorJ\SafePHPPsalmPlugin;

use Psalm\Plugin\PluginEntryPointInterface;
use Psalm\Plugin\RegistrationInterface;
use SimpleXMLElement;

final class Plugin implements PluginEntryPointInterface
{
    public function __invoke(RegistrationInterface $registration, ?SimpleXMLElement $config = null): void
    {
        $registration->addStubFile(__DIR__ . '/stubs/CoreGenericFunctions.phpstub');
        class_exists(StrReplaceReturnTypeProvider::class, true); // force auto-loading, as Psalm requires plugin classes to already be loaded
        $registration->registerHooksFromClass(StrReplaceReturnTypeProvider::class);
    }
}
