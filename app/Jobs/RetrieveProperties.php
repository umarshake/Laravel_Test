<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

use App\Property;
use App\PropertyType;

class RetrieveProperties implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    private $properties;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($api_response)
    {
        //
        $this->properties = $api_response['data'];
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        
        //
        try {
            foreach ($this->properties as $key => $item) {
                # code...
                // Log::info("uuid===>".$item['uuid']);
               $id = PropertyType::find($item['property_type_id']);
                if(! $id) {
                    $property_type = PropertyType::create($item['property_type']);
                }
                $property = Property::updateOrCreate([
                    'uuid' => $item['uuid']
                ],[
                    'uuid'  => $item['uuid'],
                    'county'  => $item['county'],
                    'country'  => $item['country'],
                    'town'  => $item['town'],
                    'description'  => $item['description'],
                    'address'  => $item['address'],
                    'latitude'  => $item['latitude'],
                    'longitude'  => $item['longitude'],
                    'image_full'  => $item['image_full'],
                    'image_thumbnail'  => $item['image_thumbnail'],
                    'num_bedrooms'  => $item['num_bedrooms'],
                    'num_bathrooms'  => $item['num_bathrooms'],
                    'price'  => $item['price'],
                    'for'  => $item['type'],
                    'property_type_id'  => $item['property_type_id'],
                    'created_at'  => $item['created_at'],
                    'updated_at'  => $item['updated_at'],
                ]);

            }
        } catch (\Exception $e) {
            // Log::notice($e->getMessage());
        }
    }
}
