
<div class="grid grid-cols-12 gap-6">

    <div class="col-span-12 lg:col-span-12 xxl:col-span-12">

        <div class="grid grid-cols-12 gap-5">

            <div class="col-span-12">

                <div class="box">

                    <div class="p-5">
                        {!! Form::model($page_content, [
                            'route' => ['admin.page_contents.update', $page_content->id],
                            'id' => 'PageContentFormUpdate',
                            'method' => 'PATCH',
                            'class' => 'form',
                            'enctype' => 'multipart/form-data',
                        ]) !!}
                        @include('admin.page_content.form')

                        <div class="grid grid-cols-12 gap-5 mt-6">
                        </div>
                        <div class="text-right mt-6">
                            <div class="mr-6"><button type="button" id="btnClosePopupEdit"
                                    class="button mr-2 bg-theme-1 text-white">
                                    Close</button>

                                <button id="update_form" type="submit"
                                    class="button w-24 bg-theme-1 text-white">Update</button>
                            </div>
                        </div>
                        <!--end::Actions-->
                        {!! Form::close() !!}
                        <!--end::Form-->
                    </div>
                    <!--end::Content-->
                </div>
                <!--end::Layout-->
            </div>
            <!--end::Body-->
        </div>
        <!--end::Careers - Apply-->
    </div>
    <!--end::Container-->
</div>
<!--end::Post-->
