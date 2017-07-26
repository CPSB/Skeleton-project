@extends('layouts.errors')

@section('content')
    <div class="container">
        <div class="jumbotron">
            <h1><span class="fa fa-ban red" aria-hidden="true"></span> 403 @lang('errors.title-403')</h1>

            <p class="lead">
                @lang('errors.title-description-403') <em><span id="display-domain"></em>.
            </p>

            <p>
                <a onclick="javascript::checkSite();" class="btn btn-default btn-lg">
                   @lang('errors.button-homepage-403')
                </a>
            </p>
        </div>
    </div>

    <div class="container">
        <div class="body-content">
            <div class="row">
                <div class="col-md-6">
                    <h2>@lang('errors.what-happend-403')</h2>

                    <p class="lead">
                        @lang('errors.what-happend-text-403')
                    </p>
                </div>
                <div class="col-md-6">
                    <h2>@lang('errors.what-to-do-title-403')</h2>
                    <p class="lead">@lang('errors.what-to-do-title-usr-403')</p>
                    <p>@lang('errors.what-to-do-text-user-403')</p>

                    <p class="lead">@lang('errors.what-to-do-dev-title-403')</p>
                    <p>@lang('errors.what-to-text-dev-403')</p>
                </div>
            </div>
        </div>
    </div>
@endsection
