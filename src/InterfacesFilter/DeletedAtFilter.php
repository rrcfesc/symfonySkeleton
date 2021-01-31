<?php

namespace App\InterfacesFilter;

interface DeletedAtFilter
{
    /**
     * @return string|array <int, string>
     */
    public static function getDeletedAtFilter();
}
