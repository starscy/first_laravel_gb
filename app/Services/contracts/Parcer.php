<?php

namespace App\Services\contracts;

interface Parcer
{
    public function setLink(string $link):self;

    public function saveParseData():void;
}
