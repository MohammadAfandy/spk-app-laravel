<?php

namespace SpkApp\Helpers;

use SpkApp\Kriteria;

class SpkHelper
{
    const BENEFIT = 'BENEFIT';
    const COST = 'COST';

    public function getKriteriaTipe()
    {
        return array_combine([self::BENEFIT, self::COST], [self::BENEFIT, self::COST]);
    }
}