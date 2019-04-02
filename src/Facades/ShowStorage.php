<?php

namespace alexmg86\ShowStorage\Facades;

use Illuminate\Support\Facades\Facade;

class ShowStorage extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'showstorage';
    }
}
