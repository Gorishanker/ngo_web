<div class="grid grid-cols-12 gap-6">

    <div class="col-span-12 lg:col-span-12 xxl:col-span-12">

        <div class="grid grid-cols-12 gap-5">

            <div class="col-span-12">

                <div class="box">

                    <div class="p-5">
                        {!! Form::open([
                            'route' => 'admin.categories.store',
                            'id' => 'TagForm',
                            'method' => 'POST',
                            'class' => 'form',
                            'enctype' => 'multipart/form-data',
                            // 'onsubmit' => 'return checkForm(this);',
                        ]) !!}

                        @include('admin.tag.form')

                        <div class="grid grid-cols-12 gap-5 mt-6">
                        </div>

                        <div class="text-right mt-6">
                            <div class="mr-6"><button type="button" id="btnClosePopupAdd"
                                    class="button mr-2 bg-theme-1 text-white">
                                    Close</button>

                                <button id="submit_form" type="submit"
                                    class="button w-24 bg-theme-1 text-white">Save</button>
                            </div>
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
