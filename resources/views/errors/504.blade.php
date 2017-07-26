@extends('layouts.errors')

@section('content')
    <div class="container">
        <div class="jumbotron">
            <h1><span class="fa fa-clock-o orange" aria-hidden="true"></span> 504 @lang('title-504')</h1>
            <p class="lead">@lang('errors.title-description-504') <em><span id="display-domain"></span></em>.</p>
            <a href="javascript:document.location.reload(true);" class="btn btn-default btn-lg text-center">
                <span class="text-success">@lang('errors.button-try-again-504')</span>
            </a>
        </div>
    </div>

    <div class="container">
        <div class="body-content">
            <div class="row">
                <div class="col-md-6">
                    <h2>@lang('errors.what-happend-504')</h2>
                    <p class="lead">@lang('errors.what-happend-504-text')</p>
                </div>

                <div class="col-md-6">
                    <h2>@lang('errors.what-to-do-title-504')</h2>
                    <p class="lead">@lang('errors.what-to-do-title-user-504')</p>

                    <p>@lang('errors.what-to-do-text-user-504-1')</p>
                    <p>@lang('errors.what-to-do-text-user-504-2')</p>

                    <p class="lead">@lang('errors.what-to-do-title-dev-504')</p>
                    <p>@lang('errors.what-to-do-text-dev-504')</p>
                </div>
            </div>
        </div>
    </div>
@endsection
