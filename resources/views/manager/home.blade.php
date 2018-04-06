@extends('shared.layout')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Manager Dashboard</div>

                <div class="panel-body">
                    {{--  You are logged in!  --}}
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
 
                    This is Manager Dashboard. You must be privileged to be here !
                </div>
            </div>
        </div>
    </div>
</div>
@endsection