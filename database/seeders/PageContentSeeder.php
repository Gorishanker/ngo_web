<?php

namespace Database\Seeders;

use App\Models\PageContent;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class PageContentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'title' => 'Pricing policy',
                'slug' => 'pricing-policy',
                'content' => 'Please add',
                'is_active' => 1,
                'created_at' => Carbon::now()
            ],
            [
                'title' => 'Terms and Conditions',
                'slug' => 'terms-and-conditions',
                'content' => 'Please add',
                'is_active' => 1,
                'created_at' => Carbon::now()
            ],
            [
                'title' => 'Privacy Policy',
                'slug' => 'privacy-policy',
                'content' => 'Please add',
                'is_active' => 1,
                'created_at' => Carbon::now()
            ],
            [
                'title' => 'Refunds/Cancellations policy',
                'slug' => 'refunds-cancellations-policy',
                'content' => 'Please add',
                'is_active' => 1,
                'created_at' => Carbon::now()
            ],
            [
                'title' => 'Shipping Policy',
                'slug' => 'shipping-policy',
                'content' => 'Please add',
                'is_active' => 1,
                'created_at' => Carbon::now()
            ],
        ];

        foreach ($data as $value) {
            PageContent::create($value);
        }
    }
}
