--TEST--
Test incorrect testFile is reported
--ARGS--
--no-configuration nonExistingFile.php
--FILE--
<?php declare(strict_types=1);
require __DIR__ . '/../../bootstrap.php';
PHPUnit\TextUI\Command::main();
--EXPECTF--
Cannot open file "nonExistingFile.php".
