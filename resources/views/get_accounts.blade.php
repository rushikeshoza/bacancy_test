@extends('master')
@section('title', 'Bacancy Test')
@section('content')

<div class="row">
    <div class="col-md-11">
        <center><h1>Accounts</h1></center>
        @php $sessionMsg = ''; @endphp
        @if(Session::has('status'))
            @php $sessionMsg = Session::get('status'); @endphp
        @endif
    </div>
    <div class="col-md-1">
        <center><h1><i class="glyphicon glyphicon-plus" id="add_account" style="cursor: pointer"></i><h1></center>
    </div>
</div>

<div>
    {{ Form::open(['route' => 'set_accounts', 'method' => 'post']) }}
        <table class="table table-hover">
            <thead>
                <tr>
                    <th></th>
                    
                    @foreach ($monthArr as $month)
                        <th>{!! Form::label(ucfirst($month)) !!}</th>
                    @endforeach
                    
                    <th>{!! Form::label('Total') !!}</th>
                </tr>
            </thead>
            
            <tbody class="content-holder">
                @foreach ($all as $no => $row)
                    @php $total = 0; $no = ($no + 1); @endphp
                    <tr>
                        <td>
                            {!! Form::label('Account ' . $no) !!}
                            {!! Form::hidden('account[' . $row->id . '][row_id]', $row->id) !!}
                        </td>
                        
                        @foreach ($monthArr as $month)
                            <td>{!! Form::number('account[' . $row->id . '][' . $month . ']', $row->{$month}, ['class' => 'form-control input-sm month-input', 'min' => 0, 'max' => 999999]) !!}</td>
                            @php $total += $row->{$month}; @endphp
                        @endforeach
                        
                        <td>{!! Form::number('account[' . $row->id . '][total]', $total, ['class' => 'form-control input-sm month-total', 'disabled' => 'disabled']) !!}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <center>{!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}</center>
    {{ Form::close() }}
</div>

@endsection

@section('jsContent')
    <script type="text/javascript">
        window.monthArr = "{{ implode(',', $monthArr) }}";
        window.sessionMsg = "{{ $sessionMsg }}";
    </script>
    <script src="{{ asset('js/accounts.js') }}"></script>
@endsection
