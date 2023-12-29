<?php

namespace App\Http\Controllers\Admin;

use App\Exports\Admin\ContactUsExport;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ContactUs;
use App\Services\ManagerLanguageService;
use App\Services\UtilityService;
use Exception;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class ContactUsController extends Controller
{
    protected $mls;
    protected $index_view, $detail_view;
    protected $utilityService;

    public function __construct()
    {
        //view files
        $this->index_view = 'admin.contact_u.index';
        $this->detail_view = 'admin.contact_u.details';

        //service files
        $this->utilityService = new UtilityService();

        //mls is used for manage language content based on keys in messages.php
        $this->mls = new ManagerLanguageService('messages');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        if ($request->ajax()) {
            $items = ContactUs::query();
            if (isset($request->date_range)) {
                list($startDate, $endDate) = explode(" - ", $request->date_range);
                $items = $items->whereDate('contact_us.created_at', '>=', $startDate)
                    ->whereDate('contact_us.created_at', '<=', $endDate);
            }
            if (isset($request->status_f)) {
                    $items = $items->where('contact_us.status', $request->status_f);
            }
            return dataTables()->eloquent($items)->toJson();
        } else {
            return view($this->index_view);
        }
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(ContactUs $contact_u)
    {
        $html = view($this->detail_view, compact('contact_u'))->render();
        return response()->json([
            'status' => true,
            'data' => $html,
        ]);
    }


    public function status($id, $status)
    {
        $result =  ContactUs::find($id)->update(['status' => $status]);
        if ($result) {
            return response()->json([
                'status' => 1,
                'message' => $this->mls->messageLanguage('updated', 'status', 1),
                'status_name' => 'success'
            ]);
        } else {
            return response()->json([
                'status' => 0,
                'message' => $this->mls->messageLanguage('not_updated', 'status', 1),
                'status_name' => 'error'
            ]);
        }
    }

    public function replay(Request $request, ContactUs $contact_u)
    {
        try {
            Mail::send('admin.email.send_contact_replay', ['replay' => $request->replay, 'user' => $contact_u], function ($message) use ($contact_u) {
                $message->to($contact_u->user->email);
                $message->from(env('MAIL_FROM_ADDRESS'), env('APP_NAME'));
                $message->subject('Contact request replay.');
            });

            return response()->json([
                'status' => 1,
                'message' => $this->mls->messageLanguage('replied', 'replay', 1),
                'status_name' => 'success'
            ]);
        } catch (Exception $e) {
            Log::alert($e);
            return response()->json([
                'status' => 0,
                'message' => $this->mls->messageLanguage('not_updated', 'status', 1),
                'status_name' => 'error'
            ]);
        }
    }

    public function export(Request $request)
    {
        return (new ContactUsExport($request))->download('contact_us.xlsx');
    }
}
