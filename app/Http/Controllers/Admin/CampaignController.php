<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CampaignRequest;
use App\Models\Campaign;
use App\Models\CampaignCombo;
use App\Models\CampaignTag;
use App\Models\Tag;
use App\Services\CampaignService;
use App\Services\FileService;
use App\Services\ManagerLanguageService;
use App\Services\WebUtilityService;
use Illuminate\Support\Arr;

class CampaignController extends Controller
{
    protected $mls, $image_directory;
    protected $index_view, $create_view, $edit_view, $detail_view;
    protected $index_route_name, $create_route_name, $edit_route_name;
    protected $bannerService, $webUtilityService;

    public function __construct()
    {

        //route
        $this->index_route_name = 'admin.campaigns.index';
        $this->create_route_name = 'admin.campaigns.create';
        $this->edit_route_name = 'admin.campaigns.edit';

        //view files
        $this->index_view = 'admin.campaign.index';
        $this->create_view = 'admin.campaign.create';
        $this->detail_view = 'admin.campaign.details';
        $this->edit_view = 'admin.campaign.edit';
        $this->image_directory = 'files/campaigns';

        //campaign files
        $this->bannerService = new CampaignService();
        $this->webUtilityService = new WebUtilityService();

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
            $items = CampaignService::datatable();
            return datatables()->eloquent($items)->toJson();
        } else {
            return view($this->index_view);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tags = Tag::where('is_active', 1)->pluck('name', 'id');
        return view($this->create_view, compact('tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CampaignRequest $request)
    {
        $input = $request->except('combo');
        $image = FileService::imageUploader($request, 'image', $this->image_directory);
        if ($image != null) {
            $input['image'] = $image;
        }
        $campaign =  $this->bannerService->create($input);
        if (isset($request->combo)) {
            foreach ($request->combo as $value) {
                if (isset($value)) {
                    $combo['campaign_id'] = $campaign->id;
                    $combo['name'] = $value['name'];
                    $combo['price'] = $value['price'];
                    CampaignCombo::insert($combo);
                }
            }
        }

        return redirect()->route($this->index_route_name)
            ->with('success', $this->mls->messageLanguage('created', 'campaign', 1));
    }
    /**
     * Display the specified resource.
     *
     * @param campaign $campaign
     * @return \Illuminate\Http\Response
     */
    public function show(Campaign $campaign)
    {
        return  view($this->detail_view, compact('campaign'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Campaign $campaign)
    {
        $tags = Tag::where('is_active', 1)->pluck('name', 'id');
        $combos = $campaign->hasMany(CampaignCombo::class,'campaign_id')->get();
        return view($this->edit_view, compact('campaign','combos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CampaignRequest $request, Campaign $campaign)
    {
        $input = $request->except('combo');
        if (!empty($input['image'])) {
            $image = FileService::imageUploader($request, 'image', $this->image_directory);
            if ($image != null) {
                $input['image'] = $image;
            }
        } else {
            $input = Arr::except($input, array('image'));
        }
        $campaign->update($input);
        CampaignCombo::where('campaign_id', $campaign->id)->delete();
        $combo = [];
        if (isset($request->combo)) {
            foreach ($request->combo as $value) {
                if (isset($value)) {
                    $combo['campaign_id'] = $campaign->id;
                    $combo['name'] = $value['name'];
                    $combo['price'] = $value['price'];
                    CampaignCombo::insert($combo);
                }
            }
        }

        return redirect()->route($this->index_route_name)
            ->with('success', $this->mls->messageLanguage('updated', 'campaign', 1));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Campaign $campaign)
    {
        $result = $campaign->delete();
        return $this->webUtilityService->swalWithTitleResponse($result, 'deleted', 'campaign');
    }

    public function status($id, $status)
    {
        $status = ($status == 1) ? 0 : 1;
        $result = $this->bannerService->updateById(['is_active' => $status], $id);
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
}
