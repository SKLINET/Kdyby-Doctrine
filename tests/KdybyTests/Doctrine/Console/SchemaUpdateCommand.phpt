<?php

/**
 * Test: Kdyby\Doctrine\Console\SchemaUpdateCommand
 *
 * @testCase Kdyby\Doctrine\Console\SchemaUpdateCommandTest
 * @author Tomáš Jacík <tomas@jacik.cz>
 * @package Kdyby\Doctrine
 */

namespace KdybyTests\Doctrine\Console;

use Nette\Utils\Strings;
use Tester\Assert;

require_once __DIR__ . '/../../bootstrap.php';



/**
 * @author Tomáš Jacík <tomas@jacik.cz>
 */
class SchemaUpdateCommandTest extends CommandTestCase
{

	public function testDumpSQL()
	{
		/** @var \Symfony\Component\Console\Tester\CommandTester $commandTester */
		$commandTester = $this->executeCommand('orm:schema-tool:update', [
			'--dump-sql' => TRUE,
		]);

		$output = $commandTester->getDisplay();

		foreach (self::$tables as $table) {
			Assert::contains("CREATE TABLE {$table}", $output);
		}
	}

}

\run(new SchemaUpdateCommandTest());
