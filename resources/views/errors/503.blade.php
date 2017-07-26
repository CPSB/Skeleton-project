@extends('layouts.errors')

@section('content')
    <div class="container">
        <div class="jumbotron">
            <h1><span class="fa fa-exclamation-traingle orange"></span> 503 @lang('errors.title-503')</h1>
            <p class="lead">
                @lang('errors.title-description-503') <em><span id="display-domain"></span></em>.
            </p>
            <a href="javascript:document.location.reload(true);" class="btn btn-default btn-lg text-center">
                <span class="green">@lang('errors.button-try-again-503')</span>
            </a>
        </div>
    </div>

    <div class="container">
        <div class="body-content">
            <div class="row">
                <div class="col-md-6">
                    <h2>@lang('errors.what-happend-503')</h2>
                    <p class="lead">
                        @lang('errors.what-happend-503-text')
                    </p>
                </div>

                <div class="col-md-6">
                    <h2>@lang('errors.what-to-do-title-503')</h2>

                    <p class="lead">@lang('errors.what-to-do-title-user-503')</p>
                    <p>@lang('errors.what-to-do-text-user-503')</p>

                    <p class="lead">@lang('errors.what-to-do-title-dev-503')</p>
                    <p>@lang('errors.what-to-do-text-dev-503')</p>
                </div>
            </div>
        </div>
    </div>
@endsection
