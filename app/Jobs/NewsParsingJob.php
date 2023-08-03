<?php
declare(strict_types=1);

namespace App\Jobs;


use App\Services\parcer\ParcerService;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class NewsParsingJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected string $link;

    public function __construct(string $link)
    {
        $this->link = $link;
    }

    public function handle(ParcerService $parser): void
    {
        $parser->setLink($this->link)->saveParseData();
    }
}
