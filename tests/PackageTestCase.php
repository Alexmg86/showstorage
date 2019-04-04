<?php

namespace alexmg86\ShowStorage\tests;


use Orchestra\Testbench\TestCase;
use alexmg86\ShowStorage\ShowStorageServiceProvider;

class PackageTestCase extends TestCase
{
    /**
     * Load package service provider
     * @param  \Illuminate\Foundation\Application $app
     * @return lasselehtinen\MyPackage\MyPackageServiceProvider
     */
    protected function getPackageProviders($app)
    {
        // return ['alemg86\ShowStorage\ShowStorageServiceProvider'];
        return [ShowStorageServiceProvider::class];
    }
    /**
     * Load package alias
     * @param  \Illuminate\Foundation\Application $app
     * @return array
     */
    protected function getPackageAliases($app)
    {
        return [
            'ShowStorage' => ShowStorage::class,
        ];
    }
}