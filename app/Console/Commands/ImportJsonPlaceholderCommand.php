<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class ImportJsonPlaceholderCommand extends Command
{

    protected $signature = 'import:jsonplaceholder';

    protected $description = 'Get data from json placeholder';



    public function handle()
    {

        return Command::SUCCESS;
    }
}
