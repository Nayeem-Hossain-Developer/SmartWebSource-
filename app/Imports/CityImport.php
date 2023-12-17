<?php

namespace App\Imports;

use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use App\Models\City;
use Illuminate\Contracts\Queue\ShouldQueue;
use Maatwebsite\Excel\Concerns\WithChunkReading;

class CityImport implements ToModel,WithHeadingRow,WithChunkReading,ShouldQueue
{
    public function model(array $row)
    {
            return new City([
                'city' => $row['city'],
                'city_ascii' => $row['city_ascii'],
                'state_id' => $row['state_id'],
                'state_name' => $row['state_name'],
                'county_fips' => $row['county_fips'],
                'county_name' => $row['county_name'],
                'lat' => $row['lat'],
                'lng' => $row['lng'],
                'population' => $row['population'],
                'density' => $row['density'],
                'source' => $row['source'],
                'military' => $row['military'],
                'incorporated' => $row['incorporated'],
                'timezone' => $row['timezone'],
                'ranking' => $row['ranking'],
                'zips' => $row['zips'],
            ]);
    }

    public function chunkSize(): int
    {
        return 10;
    }
}
