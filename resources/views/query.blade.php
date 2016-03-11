<!-- resources/views/query.blade.php -->

@extends('layouts.app')

@section('content')

    <!-- Bootstrap Boilerplate... -->

    <div class="panel-body">
        <!-- Display Validation Errors -->
        @include('common.errors')

        <!-- New query Form -->
        <form action="{{ url('query') }}" method="POST" class="form-horizontal">
            {!! csrf_field() !!}

            <!-- query Name -->
            <div class="form-group">
                <label for="query" class="col-sm-3 control-label">query</label>

                <div class="col-sm-6">
                    <input type="text" name="name" id="query-name" class="form-control">
                </div>
            </div>

            <!-- Add query Button -->
            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-6">
                    <button type="submit" class="btn btn-default">
                        <i class="fa fa-plus"></i> Add query
                    </button>
                </div>
            </div>
        </form>
    </div>

    <!-- TODO: Current querys -->
@endsection
