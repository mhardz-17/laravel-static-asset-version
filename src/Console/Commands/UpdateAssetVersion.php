<?php

namespace Mhardz\LaravelStaticAssetVersion\Console\Commands;

use Carbon\Carbon;
use Illuminate\Console\Command;

class UpdateAssetVersion extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'asset-version:refresh';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Change the content of the version.txt to clear browser cached for static pages.';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $ds = DIRECTORY_SEPARATOR;

        try {
            $version_file = base_path().$ds.'version.txt';
            if(!file_exists($version_file)) {
                $version = time();
                if(file_put_contents($version_file, $version)) {
                    $this->info('Version File was created and version was ' . $version);
                }else {
                    throw new \Exception('Please create version.txt on root directory as dont have permission to create.');
                }

            } else {
                if(!is_writable($version_file)) {
                    throw new \Exception('version.txt is not writable');
                } else {
                    $version = time();
                    file_put_contents($version_file, $version);
                    $this->info('Version was updated to ' . $version);
                }
            }
        } catch (\Exception $e) {
            $this->error($e->getMessage());
        }

        try {

            \Artisan::call('view:clear');
            $this->info('View Cache Cleared');

            \Artisan::call('cache:clear');
            $this->info('System Cache Cleared');

            $this->info('Config Cache Cleared');
            \Artisan::call('config:clear');

            $this->info('Route Cache Cleared');
            \Artisan::call('route:clear');

        } catch (\Exception $e) {
            $this->error($e->getMessage());
        }
    }
}
