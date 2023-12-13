<?php

namespace App\Exports\Admin;

use App\Services\GurujiService;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class GurujiExport implements FromQuery, WithHeadings, ShouldAutoSize, WithStyles
{
    /**
     * @return \Illuminate\Support\Collection
     */
    use Exportable;

    protected $name, $email, $status, $country_code,$is_document_verify, $mobile_no,$date_range,$start_date, $gurujiService;

    public function __construct(Request $request)
    {
        $this->name = $request->name_f;
        $this->email = $request->email_f;
        $this->mobile_no = $request->mobile_no_f;
        $this->country_code = $request->country_code_f;
        $this->status = $request->status_f;
        $this->date_range = $request->date_range_f;
        $this->start_date = $request->start_date;
        $this->is_document_verify = $request->is_document_verify_f;
        $this->gurujiService = new GurujiService;
    }

    public function query()
    {
        $guruji = $this->gurujiService->downloadReport();
        if(isset( $this->name)){
            $guruji = $guruji->where('name','ilike', "%{$this->name}%");
        }
        if(isset( $this->email)){
            $guruji = $guruji->where('email','ilike', "%{$this->email}%");
        }
        if(isset( $this->mobile_no)){
            $guruji = $guruji->where('mobile_no','ilike', "%{$this->mobile_no}%");
        }
        if(isset( $this->country_code)){
            $guruji = $guruji->where('country_code', $this->country_code);
        }
        if(isset( $this->is_document_verify)){
            $guruji = $guruji->where('is_document_verify', $this->is_document_verify);
        }
        if(isset( $this->status)){
            $guruji = $guruji->where('is_active', $this->status);
        }
        if(isset( $this->date_range) && isset( $this->start_date)){
            $guruji = $guruji->whereDate('created_at', '>=', $this->date_range)->whereDate('created_at', '<=', $this->start_date);
        }else{
            if(isset( $this->start_date)){
                $guruji = $guruji->whereDate('created_at', $this->start_date);
            }
        }
        return $guruji;
    }

    public function headings(): array
    {
        return [
            'Guruji-Id',
            'Name',
            'Country code',
            'Mobile Number',
            'Email',
            'Gender',
            'Language',
            'About us',
            'Experience',
            'Referral code',
            'Per question',
            'Per session',
            'Status',
            'Is complete',
            'Is document verify',
            'Created Date',
            'Updated Date',
            'Avg rating',
        ];
    }

    public function styles(Worksheet $sheet)
    {
        $sheet->getStyle('B')->getFont()->setBold(true);
        $sheet->getStyle(1)->getFont()->setBold(true);
    }
}
