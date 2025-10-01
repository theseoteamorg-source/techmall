<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Facades\Sitemap;

class GenerateSitemap extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sitemap:generate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate the sitemap.';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        Sitemap::generate();
        $this->info('The sitemap has been generated.');
    }
}
