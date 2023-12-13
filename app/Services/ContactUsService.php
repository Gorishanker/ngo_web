<?php

namespace App\Services;

use App\Models\ContactUs;

class ContactUsService
{
    /**
     * Fetch records for datatables
     */
    public static function datatable()
    {
        $data = ContactUs::leftJoin('users', 'users.id', 'contact_us.user_id')
                    ->select(
                        'users.name as user_name',
                        'users.email as user_email',
                        'contact_us.id',
                        'message',
                        'contact_us.status',
                        'contact_us.created_at',
                    );
        return $data;
    }

   /**
     * Fetch records for datatables
     */
    public static function exportDataQuery()
    {
        $data = ContactUs::leftJoin('users', 'users.id', 'contact_us.user_id')
        ->select(
            'contact_us.id',
            'users.name as user_name',
            'contact_us.user_type',
            'contact_us.message',
            'contact_us.status',
            'contact_us.created_at',
            'contact_us.updated_at',
        )->orderBy('created_at', 'desc');
    return $data;
    }
}
