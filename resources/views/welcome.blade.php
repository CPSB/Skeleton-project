@extends('layouts.app')

@section('title', 'Index')

@section('content')
    @if (session()->get('class') && session()->get('message'))
        <div style="padding-top: 15px;" class="row">
            <div class="col-md-12">
                <div class="{{ session()->get('class') }}" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    {{ session()->get('message') }}
                </div>
            </div>
        </div>
    @endif

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default"> {{-- This can be deleted. --}}
                <div class="panel-heading">
                    Applicatie barebone:
                </div>
            </div> {{-- END deletable content --}}
        </div>
    </div>
@endsection
