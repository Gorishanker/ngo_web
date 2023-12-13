<?php

namespace App\Exports\Admin;

use App\Services\CustomerService;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class CustomerExport implements FromQuery, WithHeadings, ShouldAutoSize, WithStyles
{
    /**
     * @return \Illuminate\Support\Collection
     */
    use Exportable;

    protected $name, $email, $status, $country_code, $mobile_no,$date_range,$start_date, $customerService;

    public function __construct(Request $request)
    {
        $this->name = $request->name_f;
        $this->email = $request->email_f;
        $this->mobile_no = $request->mobile_no_f;
        $this->country_code = $request->country_code_f;
        $this->status = $request->status_f;
        $this->date_range = $request->date_range_f;
        $this->start_date = $request->start_date;
        $this->customerService = new CustomerService;
    }

    public function query()
    {
        $customer = $this->customerService->downloadcustomerReport();
        if(isset( $this->name)){
            $customer = $customer->where('name','ilike', "%{$this->name}%");
        }
        if(isset( $this->email)){
            $customer = $customer->where('email','ilike', "%{$this->email}%");
        }
        if(isset( $this->mobile_no)){
            $customer = $customer->where('mobile_no','ilike', "%{$this->mobile_no}%");
        }
        if(isset( $this->country_code)){
            $customer = $customer->where('country_code', $this->country_code);
        }
        if(isset( $this->status)){
            $customer = $customer->where('is_active', $this->status);
        }
        if(isset( $this->date_range) && isset( $this->start_date)){
            $customer = $customer->whereDate('created_at', '>=', $this->date_range)->whereDate('created_at', '<=', $this->start_date);
        }else{
            if(isset( $this->start_date)){
                $customer = $customer->whereDate('created_at', $this->start_date);
            }
        }
        return $customer;
    }

    public function headings(): array
    {
        return [
            'User-Id',
            'Name',
            'Country code',
            'Mobile Number',
            'Email',
            'Gender',
            'Date of birth',
            'Time of birth',
            'Place of birth',
            'Referral code',
            'Language',
            'Wallet balance',
            'Status',
            'Referred by',
            'Created Date',
            'Updated Date',
        ];
    }

    public function styles(Worksheet $sheet)
    {
        $sheet->getStyle('B')->getFont()->setBold(true);
        $sheet->getStyle(1)->getFont()->setBold(true);
    }
}
