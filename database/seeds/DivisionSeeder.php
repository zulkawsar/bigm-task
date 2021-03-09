<?php

use Illuminate\Database\Seeder;

class DivisionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $divisions = [
        	['name' => 'Barisal'],
        	['name' => 'Chittagong'],
        	['name' => 'Dhaka'],
        	['name' => 'Khulna'],
        	['name' => 'Mymensingh'],
        	['name' => 'Rajshahi'],
        	['name' => 'Rangpur'],
        	['name' => 'Sylhet']
        ];

        DB::table('divisions')->truncate();

        Division::create($divisions);

        $districts = [
        	// Barisal
        	['division_id' => 1, 'name' => 'Barisal' ],
        	['division_id' => 1, 'name' => 'Barguna' ],
        	['division_id' => 1, 'name' => 'Bhola' ],
        	['division_id' => 1, 'name' => 'Jhalokati' ],
        	['division_id' => 1, 'name' => 'Patuakhali' ],
        	['division_id' => 1, 'name' => 'Pirojpur' ],

        	// Chittagong
        	['division_id' => 2, 'name' => 'Brahmanbaria'],
        	['division_id' => 2, 'name' => 'Comilla'],
        	['division_id' => 2, 'name' => 'Chandpur'],
        	['division_id' => 2, 'name' => 'Lakshmipur'],
        	['division_id' => 2, 'name' => 'Maijdee'],
        	['division_id' => 2, 'name' => 'Feni'],
        	['division_id' => 2, 'name' => 'Comilla'],
        	['division_id' => 2, 'name' => 'Khagrachhari'],
        	['division_id' => 2, 'name' => 'Bandarban'],
        	['division_id' => 2, 'name' => 'Chittagong'],
        	['division_id' => 2, 'name' => 'Cox Bazar'],
        	['division_id' => 2, 'name' => 'Chittagong'],
        ];

        DB::table('districts')->truncate();

        District::create($districts);


        $sub_district = [

        	// for Barisal district
        	['district_id' => 1, 'name' => 'Agailjhara' ],
        	['district_id' => 1, 'name' => 'Babuganj' ],
        	['district_id' => 1, 'name' => 'Bakerganj' ],
        	['district_id' => 1, 'name' => 'Banaripara' ],
        	['district_id' => 1, 'name' => 'Barisal Sadar' ],
        	['district_id' => 1, 'name' => 'Gournadi' ],
        	['district_id' => 1, 'name' => 'Hizla' ],
        	['district_id' => 1, 'name' => 'Mehendiganj' ],
        	['district_id' => 1, 'name' => 'Muladi'],
        	['district_id' => 1, 'name' => 'Wazirpur'],


        ];

    }
}
