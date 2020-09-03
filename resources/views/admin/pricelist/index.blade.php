@extends('admin.layouts.master')

@section('content')

<p>{!! link_to_route(config('coreadmin.route').'.pricelist.create', trans('coreadmin::templates.templates-view_index-add_new') , null, array('class' => 'btn btn-success')) !!}</p>

@if ($pricelist->count())
    <div class="portlet box green">
        <div class="portlet-title">
            <div class="caption">{{ trans('coreadmin::templates.templates-view_index-list') }}</div>
        </div>
        <div class="portlet-body">
            <table class="table table-striped table-hover table-responsive datatable" id="datatable">
                <thead>
                    <tr>
                       {{--  <th>
                            {!! Form::checkbox('delete_all',1,false,['class' => 'mass']) !!}
                        </th> --}}
                        <th style="text-align: center;">Attachment</th>
                        <th style="text-align: center;">Division</th>
                        <th style="text-align: center;">Action</th>

                        {{-- <th>&nbsp;</th> --}}
                    </tr>
                </thead>

                <tbody>
                    @foreach ($pricelist as $row)
                        <tr>
                           {{--  <td>
                                {!! Form::checkbox('del-'.$row->id,1,false,['class' => 'single','data-id'=> $row->id]) !!}
                            </td> --}}
                            <td style="text-align: center;">{{ $row->attachment }}</td>
                            <td style="text-align: center;">{{ $division[$row->division] }}</td>

                             <td>
                                {{-- {!! link_to_route(config('coreadmin.route').'.pricelist.edit', trans('coreadmin::templates.templates-view_index-edit'), array($row->id), array('class' => 'btn btn-xs btn-info')) !!} --}}
                                {!! Form::open(array('style' => 'display: inline-block;', 'method' => 'DELETE', 'onsubmit' => "return confirm('".trans("coreadmin::templates.templates-view_index-are_you_sure")."');",  'route' => array(config('coreadmin.route').'.pricelist.destroy', $row->id))) !!}
                                {!! Form::submit(trans('coreadmin::templates.templates-view_index-delete'), array('class' => 'btn btn-xs btn-danger')) !!}
                                {!! Form::close() !!}
                            </td>
                         </tr>
                    @endforeach
                </tbody>
            </table>
           {{--  <div class="row">
                <div class="col-xs-12">
                    <button class="btn btn-danger" id="delete">
                        {{ trans('coreadmin::templates.templates-view_index-delete_checked') }}
                    </button>
                </div>
            </div> --}}
            {!! Form::open(['route' => config('coreadmin.route').'.pricelist.massDelete', 'method' => 'post', 'id' => 'massDelete']) !!}
                <input type="hidden" id="send" name="toDelete">
            {!! Form::close() !!}
        </div>
	</div>
@else
    {{ trans('coreadmin::templates.templates-view_index-no_entries_found') }}
@endif

@endsection

@section('javascript')
    <script>
        $(document).ready(function () {
            $('#delete').click(function () {
                if (window.confirm('{{ trans('coreadmin::templates.templates-view_index-are_you_sure') }}')) {
                    var send = $('#send');
                    var mass = $('.mass').is(":checked");
                    if (mass == true) {
                        send.val('mass');
                    } else {
                        var toDelete = [];
                        $('.single').each(function () {
                            if ($(this).is(":checked")) {
                                toDelete.push($(this).data('id'));
                            }
                        });
                        send.val(JSON.stringify(toDelete));
                    }
                    $('#massDelete').submit();
                }
            });
        });
    </script>
@stop