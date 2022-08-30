<?php
namespace KameGame;

require_once __DIR__ . '..\..\autoload.php';

use KameGame\Utility;

class UtilityTest extends \PHPUnit\Framework\TestCase {

    public function testThatValidateCanCleanData()
    {

        $this->assertSame(Utility::validate("   \\<html>"), "&lt;html&gt;");

    }

}