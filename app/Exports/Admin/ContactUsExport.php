<?php

namespace App\Exports\Admin;

use App\Services\ContactUsService;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class ContactUsExport implements FromQuery, WithHeadings, ShouldAutoSize, WithStyles
{
    /**
     * @return \Illuminate\Support\Collection
     */
    use Exportable;

    protected $status, $date_range, $user_type;

    public function __construct(Request $request)
    {
        $this->status = $request->status_f;
        $this->date_range = $request->date_range;
        $this->user_type = $request->user_type;
    }

    public function query()
    {
        $contact_us = ContactUsService::exportDataQuery();
        if (isset($this->date_range)) {
            list($startDate, $endDate) = explode(" - ", $this->date_range);
            $contact_us = $contact_us->whereDate('contact_us.created_at', '>=', $startDate)
                            ->whereDate('contact_us.created_at', '<', $endDate);
        }
        if(isset($this->status)){
            if($this->status == 'pending'){
                $contact_us = $contact_us->where('contact_us.status', $this->status)->orWhere('contact_us.status',null);
            }else{
                $contact_us = $contact_us->where('contact_us.status', $this->status);
            }
        }
        if(isset($this->user_type)){
            $contact_us = $contact_us->where('contact_us.user_type', $this->user_type);
        }
        return $contact_us;
    }

    public function headings(): array
    {
        return [
            'Id',
            'User name',
            'User Type',
            'Message',
            'Status',
            'Created at',
            'Updated at',
        ];
    }

    public function styles(Worksheet $sheet)
    {
        $sheet->getStyle('B')->getFont()->setBold(true);
        $sheet->getStyle(1)->getFont()->setBold(true);
    }
}
