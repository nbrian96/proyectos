<?php

namespace Database\Seeders;

use App\Models\Rank;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RankSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $ranks = [
            'None',
            '1st Electrician',
            '2nd Engineer',
            '2nd Officer Navigation',
            '3rd Officer',
            'AB Expedition',
            'AB Fireman',
            'Able Seaman',
            'Asst Expedition Leader',
            'Asst Stateroom Steward/ess',
            'Asst Waiter/ess',
            'Beauty Therapist',
            'Beverage Manager',
            'Bosun',
            'Café Attendant',
            'Chef de Cuisine Pastry',
            'Chief Engineer',
            'Chief Officer Submarine Pilot',
            'Chief Scientist',
            'Cook',
            'Engine Storekeeper',
            'Expedition Guide',
            'Expedition Leader',
            'Expedition Program Coordinator',
            'Explorer Staff',
            'Fitter',
            'Fitter Hangar Mechanic',
            'General Manager',
            'General Naturalist',
            'Guest Services Manager',
            'Hairdresser',
            'Head Baker',
            'Hotel Purser',
            'Hotel Utility / Custodial',
            'Lead Guide',
            'Master',
            'Motorman',
            'Ordinary Seaman',
            'Program Manager',
            'Public Health Officer',
            'Reefer Engineer',
            'Security Guard',
            'Specialist',
            'Stateroom Steward/ess',
            'Storekeeper',
            'Systems Manager',
            'Travel Consultant',
            'Upholsterer',
            'Waiter/ess'
        ];

        foreach ($ranks as $rank) {
            Rank::create(['name' => $rank, 'description' => '']);
        }
    }
}
