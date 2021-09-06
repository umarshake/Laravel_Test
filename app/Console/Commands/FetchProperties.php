<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Config;

use App\Property;
use App\PropertyType;

use App\Http\Services\ApiService;
use App\Jobs\RetrieveProperties;

class FetchProperties extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:fetch-properties';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = ' Fetch properties from an api ';
    private $pages = 10; 

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
        $page =1;
        do{
           
            $api_service = new ApiService();
            // Log::notice("Fetching started for page=".$page);
            $response = $api_service->getDataFromApi($page);
            // Log::notice("Fetching completed for page=".$page);
            RetrieveProperties::dispatch($response)
                    ->delay(now()->addSeconds(5));

            $page += 1;
        }while($page <= $this->pages);


        // Log::notice("Data Saved Successfully");
    }
}
