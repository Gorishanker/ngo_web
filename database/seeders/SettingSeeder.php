<?php

namespace Database\Seeders;

use App\Models\Setting;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data=[
            [   'title'=>'site_name',
                'slug'=>'site_name',
                'value'=>'NGO WEB',
                'field_type'=> 'text',
                'setting_type'=> '1',
                'created_at'=> Carbon::now()
            ],
            [   'title'=>'web_site_name',
                'slug'=>'web_site_name',
                'value'=>'NGO WEB',
                'field_type'=> 'text',
                'setting_type'=> '1',
                'created_at'=> Carbon::now()
            ],
            [   'title'=>'copyright_text',
                'slug'=>'copyright_text',
                'value'=>'NGO WEB',
                'field_type'=> 'text',
                'setting_type'=> '1',
                'created_at'=> Carbon::now()
            ],
            [   'title'=>'email',
                'slug'=>'email',
                'value'=>'ngo@gmail.com',
                'field_type'=> 'text',
                'setting_type'=> '1',
                'created_at'=> Carbon::now()
            ],
            [   'title'=>'contact_number',
                'slug'=>'contact_number',
                'value'=>'',
                'field_type'=> 'text',
                'setting_type'=> '1',
                'created_at'=> Carbon::now()
            ],
            [   'title'=>'address',
                'slug'=>'address',
                'value'=>'',
                'field_type'=> 'text',
                'setting_type'=> '1',
                'created_at'=> Carbon::now()
            ],
            [   'title'=>'address',
                'slug'=>'address',
                'value'=>'',
                'field_type'=> 'text',
                'setting_type'=> '1',
                'created_at'=> Carbon::now()
            ],
            [   'title'=>'about_company',
                'slug'=>'about_company',
                'value'=>'',
                'field_type'=> 'text',
                'setting_type'=> '1',
                'created_at'=> Carbon::now()
            ],
            [   'title'=>'logo',
                'slug'=>'logo',
                'value'=>'',
                'field_type'=> 'text',
                'setting_type'=> '1',
                'created_at'=> Carbon::now()
            ],
            [   'title'=>'favicon',
                'slug'=>'favicon',
                'value'=>'',
                'field_type'=> 'text',
                'setting_type'=> '1',
                'created_at'=> Carbon::now()
            ],
            [   'title'=>'letest_campaign_video_url',
                'slug'=>'application_from_email_address',
                'value'=>'info@cashcry.com',
                'field_type'=> 'text',
                'setting_type'=> '1',
                'created_at'=> Carbon::now()
            ],
            [   'title'=>'whatsapp_number',
                'slug'=>'whatsapp_number',
                'value'=>'',
                'field_type'=> 'text',
                'setting_type'=> '1',
                'created_at'=> Carbon::now()
            ],
            [   'title'=>'Address',
                'slug'=>'address',
                'value'=>'',
                'field_type'=> 'text',
                'setting_type'=> '1',
                'created_at'=> Carbon::now()
            ],
            [   'title'=>'twitter_url',
                'slug'=>'twitter_url',
                'value'=>'',
                'field_type'=> 'text',
                'setting_type'=> '1',
                'created_at'=> Carbon::now()
            ],
            [   'title'=>'facebook_url',
                'slug'=>'facebook_url',
                'value'=>'',
                'field_type'=> 'text',
                'setting_type'=> '1',
                'created_at'=> Carbon::now()
            ],
            [   'title'=>'instagram_url',
                'slug'=>'instagram_url',
                'value'=>'',
                'field_type'=> 'text',
                'setting_type'=> '1',
                'created_at'=> Carbon::now()
            ],
            [   'title'=>'linkedin_url',
                'slug'=>'linkedin_url',
                'value'=>'',
                'field_type'=> 'text',
                'setting_type'=> '1',
                'created_at'=> Carbon::now()
            ],
            [   'title'=>'bank_name',
                'slug'=>'bank_name',
                'value'=>'',
                'field_type'=> 'text',
                'setting_type'=> '1',
                'created_at'=> Carbon::now()
            ],
            [   'title'=>'ac_number',
                'slug'=>'ac_number',
                'value'=>'',
                'field_type'=> 'text',
                'setting_type'=> '1',
                'created_at'=> Carbon::now()
            ],
            [   'title'=>'ifsc_code',
                'slug'=>'ifsc_code',
                'value'=>'',
                'field_type'=> 'text',
                'setting_type'=> '1',
                'created_at'=> Carbon::now()
            ],
            [   'title'=>'ac_name',
                'slug'=>'ac_name',
                'value'=>'',
                'field_type'=> 'text',
                'setting_type'=> '1',
                'created_at'=> Carbon::now()
            ],
        [   'title'=>'branch',
            'slug'=>'branch',
            'value'=>'',
            'field_type'=> 'text',
            'setting_type'=> '1',
            'created_at'=> Carbon::now()
        ],
        [   'title'=>'qr_scanner',
            'slug'=>'qr_scanner',
            'value'=>'',
            'field_type'=> 'text',
            'setting_type'=> '1',
            'created_at'=> Carbon::now()
        ],
        ];

        foreach ($data as $value) {
	    	Setting::create($value);
    	}
    }
}
