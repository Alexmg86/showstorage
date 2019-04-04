<?php

namespace Tests\Unit;

use alexmg86\ShowStorage\ShowStorage;
use alexmg86\ShowStorage\Tests\PackageTestCase;

class ShowStorageTest extends PackageTestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
        $this->assertTrue(true);
    }

    public function checkGetFiles()
    {
    	$files = ShowStorage::getFiles();
    	$this->assertIsArray($files);
    }
}