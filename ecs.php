<?php

declare(strict_types=1);

use PhpCsFixer\Fixer\Import\NoUnusedImportsFixer;
use PhpCsFixer\Fixer\FunctionNotation\MethodArgumentSpaceFixer;
use Symplify\EasyCodingStandard\Config\ECSConfig;

return ECSConfig::configure()
    ->withPaths([
        __DIR__ . '/src',
    ])
    ->withRules([
        NoUnusedImportsFixer::class,
        MethodArgumentSpaceFixer::class,
    ])
    ->withPreparedSets(
        arrays: true,
        namespaces: true,
        docblocks: false,
        psr12: true 
    );
