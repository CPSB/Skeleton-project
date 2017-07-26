@extends('layouts.errors')

@section('content')
    <div class="container">
        <div class="jumbotron">
            <h1><span class="glyphicon glyphicon-fire red"></span> 500 @lang('errors.title-500')</h1>
            <p class="lead">@lang('errors.title-description-500') <em><span id="display-domain"></span></em></p>
            <a href="javascript:document.location.reload(true);" class="btn btn-default btn-lg text-center">
                <span class="green">@lang('errors.button-try-again-500')</span>
            </a>
        </div>
    </div>

    <div class="container">
        <div class="body-content">
            <div class="row">
                <div class="col-md-6">
                    <h2>@lang('errors.what-happend-500')</h2>
                    <p class="lead">@lang('errors.what-happend-text-500')</p>
                </div>

                <div class="col-md-6">
                    <h2>@lang('errors.what-to-do-title-user-500')</h2>
                    <p>@lang('errors.what-to-do-text-user-500')</p>

                    <h2>@lang('errors.what-to-do-title-dev-500')</h2>
                    <p class="lead">@lang('errors.what-to-do-text-dev-500')</p>
                </div>
            </div>
        </div>
    </div>
@endsection
