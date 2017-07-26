@extends('layouts.error')

@section('content')
    <div class="container">
        <div class="jumbotron">
            <h1>
                <span class="fa fa-bolt orange" aria-hidden="true"></span>
                @lang('errors.title-502')
            </h1>
            <p class="lead">
                @lang('errors.title-description-502') <em><span id="display-domain"></span>.</em>
            </p>

            <a href="javascript:document.location.reload(true)" class="btn btn-default btn-lg text-center">
                <span class="green">@lang('errors.btn-try-again-502')</span>
            </a>
        </div>
    </div>

    <div class="container">
        <div class="body-content">
            <div class="row">
                <div class="col-md-6">
                    <h2>@lang('errors.what-happend-502')</h2>
                    <p class="lead">@lang('errors.what-happend-text-502')</p>
                </div>

                <div class="col-md-6">
                    <h2>@lang('errors.what-to-do-title-502')</h2>

                    <p class="lead">@lang('errors.what-to-do-title-user-502')</p>
                    <p>
                        <a onclick="javascript:checkSite();">
                            @lang('errors.what-to-do-text-user-502-1')
                        </a>
                    </p>

                    <p>
                        @lang('errors.what-to-do-text-dev-502-2')
                    </p>

                    <p class="lead">@lang('errors.what-to-do-title-dev-502')</p>
                    <p>@lang('errors.what-to-do-text-dev-502')</p>
                </div>
            </div>
        </div>
    </div>
@endsection
