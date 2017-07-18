@extends('layouts.app')

@section('title', trans('roles.title-html'))

@section('content')
    {{-- Modal --}}
    <div class="modal fade" id="roleModal" tabindex="-1" role="dialog" aria-labelledby="roleModalLabel">
        <div class="modal-dialog" role="document">
            {{ Form::open(['method' => 'post']) }}

            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>

                    <h4 class="modal-title" id="roleModalLabel">@lang('roles.title')</h4>
                </div>
                <div class="modal-body">
                    {{-- Name Form input --}}
                    <div class="form-group @if ($errors->has('name')) has-error @endif">
                        {!! Form::label('name', trans('roles.label-name')) !!}
                        {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => trans('roles.placeholder-name')]) !!}
                        @if ($errors->has('name')) <p class="help-block">{{ $errors->first('name')}}</p> @endif
                    </div>
                </div>
                <div class="modal-footer">
                    {{ Form::submit('Submit', ['class' => 'btn btn-primary']) }} {{-- Submit form button --}}
                    <button type="button" class="btn btn-default" data-dissmiss="modal">
                        @lang('roles.view-button-modal-close')
                    </button>
                </div>
                {{ Form::close() }}
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-5">
            <h3 class="modal-title">Roles:</h3>
        </div>
        <div class="col-md-7 page-action text-right">
            @can('add_roles')
                <a href="#" class="btn btn-sm btn-success pull-right" data-toggle="modal" data-target="#roleModal">
                    <i class="glyphicon glyphicon-plus"></i> @lang('roles.view-button-new')
                </a>
            @endcan
        </div>
    </div>

    @forelse ($roles as $role)
        {!! Form::model($role, ['method' => 'PUT', 'route' => ['roles.update',  $role->id ], 'style' => 'margin-bottom: 25px;']) !!}

        @if ($role->name === 'Admin')
            @include('shared._permissions', ['title' => trans('roles.view-collapse-heading', ['name' => $role->name]), 'options' => ['disabled'] ])
        @else
            @include('shared._permissions', ['title' => trans('roles.view-collapse-heading', ['name' => $role->name]), 'model' => $role ])

            @can('edit_roles')
                {!! Form::submit(trans('roles.view-button-save', ['name' => $role->name]), ['class' => 'btn btn-primary']) !!}
                @if ($role->name !== 'Admin' && $role->name !== 'User')
                    <form action="{{ route('roles.destroy', $role) }}" >
                        {{ method_field('DELETE') }}
                        <button class="btn btn-danger" type="submit">
                            @lang('roles.view-button-role-delete', ['name' => $role->name])
                        </button>
                    </form>
                @endif
            @endcan
        @endif

        {!! Form::close() !!}

    @empty
        <p>{!! trans('roles.view-error-no-roles') !!}</p>
    @endforelse
@endsection
