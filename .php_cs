<?php
/**
 * TERYT-API
 *
 * Copyright (c) 2019 pudelek.org.pl
 *
 * @license MIT License (MIT)
 *
 * For the full copyright and license information, please view source file
 * that is bundled with this package in the file LICENSE
 *
 * @author Marcin Pudełek <marcin@pudelek.org.pl>
 *
 */

use PhpCsFixer\Config;
use PhpCsFixer\Finder;
$rules = [
    // default
    '@PSR2'                      => true,
    '@Symfony'                   => true,
    // additionally
    'array_syntax'               => ['syntax' => 'short'],
    'concat_space'               => false,
    'cast_spaces'                => false,
    'no_unused_imports'          => false,
    'no_useless_else'            => true,
    'no_useless_return'          => true,
    'no_superfluous_phpdoc_tags' => false,
    'ordered_imports'            => true,
    'phpdoc_align'               => true,
    'phpdoc_order'               => true,
    'phpdoc_trim'                => true,
    'phpdoc_summary'             => false,
    'simplified_null_return'     => false,
    'ternary_to_null_coalescing' => true,
    'binary_operator_spaces'     => ['default' => 'align'],
];
$finder = (new Finder())
    ->files()
    ->name('*.php')
    ->in(__DIR__ . '/app')
;
return (new Config('rod-panel'))
    ->setRiskyAllowed(true)
    ->setRules($rules)
    ->setFinder($finder)
    ;