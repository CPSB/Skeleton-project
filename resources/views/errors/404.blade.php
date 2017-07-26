@extends('layouts.errors')

@section('content')
    <div class="container">
        <div class="jumbotron">
            <h1><span class="fa fa-frown-o red" aria-hidden="true"></span> 404 @lang('errors.title-404')
            <p class="lead">@lang('errors.title-description-404') <em><span id="display-domain"></span></em></p>
            <p>
                <a onclick="javascript:checkSite();" class="btn btn-default btn-lg">
                    <span class="green">@lang('errors.button-homepage-404')</span>
                </a>
            </p>
        </div>
    </div>

    <div class="container">
        <div class="body-content">
            <div class="row">
                <div class="col-md-6">
                    <h2>@lang('errors.what-happend-404')</h2>
                    <p class="lead">@lang('errors.what-happend-text-404')</p>
                </div>
                <div class="col-md-6">
                    <h2>@lang('errors.what-to-do-title-404')</h2>

                    <p class="lead">@lang('errors.what-to-do-title-user-404')</p>
                    <p>@lang('errors.what-to-do-text-user-404')</p>

                    <p class="lead">@lang('errors.what-to-do-dev-title-404')</p>
                    <p>@lang('errors.what-to-do-text-dev-404')</p>
                </div>
            </div>
        </div>
    </div>
@endsection
