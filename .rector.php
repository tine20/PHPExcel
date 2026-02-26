<?php

declare(strict_types=1);

use PhpParser\Node\Expr\Cast\Double;
use PhpParser\Node\Expr\Cast\Int_;
use PhpParser\Node\Expr\Cast\Bool_;
use PhpParser\Node\Expr\Cast\String_;
use Rector\Config\RectorConfig;
use Rector\CodeQuality\Rector as CodeQuality;
use Rector\Renaming\Rector\Cast\RenameCastRector;
use Rector\Renaming\ValueObject\RenameCast;
use Rector\ValueObject\PhpVersion;

return RectorConfig::configure()
    ->withPaths([
        __DIR__ . '/Classes/',
    ])
    ->withRules([
        Rector\Php85\Rector\Switch_\ColonAfterSwitchCaseRector::class,
        Rector\Php84\Rector\Param\ExplicitNullableParamTypeRector::class,
        Rector\Php85\Rector\ShellExec\ShellExecFunctionCallOverBackticksRector::class,
    ])->withConfiguredRule(RenameCastRector::class, [
        new RenameCast(Double::class, Double::KIND_REAL, Double::KIND_FLOAT),
        new RenameCast(Double::class, Double::KIND_DOUBLE, Double::KIND_FLOAT),
        new RenameCast(Int_::class, Int_::KIND_INTEGER, Int_::KIND_INT),
        new RenameCast(Bool_::class, Bool_::KIND_BOOLEAN, Bool_::KIND_BOOL),
        new RenameCast(String_::class, String_::KIND_BINARY, String_::KIND_STRING),
    ])
    ->withPhpVersion(PhpVersion::PHP_85);