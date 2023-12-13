<!--begin::Post-->
<div class="intro-y datatable-wrapper box p-5 mt-3">
    <table id="{{isset($table_id) ? $table_id : 'kt_table_1'}}" class="table table-report table-report--bordered display w-full_datatable">
        <thead>
            <tr>
                @if (isset($data) && is_array($data))
                    @foreach ($data as $data_value)
                        <th class="border-b-2 whitespace-no-wrap {{ $data_value['classname'] }}">
                            {{ $data_value['title'] }}
                        </th>
                    @endforeach
                @endif
            </tr>
        </thead>
        <tbody></tbody>
    </table>
</div>
<!--end::Post-->