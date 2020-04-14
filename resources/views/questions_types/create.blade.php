@extends('layouts.app')

@section('content')

    <div class="card ">

        <div class="card-header">
            
            <span class="float-left">
                <h4 class="mt-5 mb-5">Create New Questions Types</h4>
            </span>

            <div class="float-right">
                <a href="{{ route('questions_types.questions_types.index') }}" class="btn btn-primary" title="Show All Questions Types">
                    <i class="fas fa-list"></i>
                </a>
            </div>

        </div>

        <div class="card-body">
        
            @if ($errors->any())
                <ul class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            @endif

            <form method="POST" action="{{ route('questions_types.questions_types.store') }}" accept-charset="UTF-8" id="create_questions_types_form" name="create_questions_types_form" class="form-horizontal">
            {{ csrf_field() }}
            @include ('questions_types.form', [
                                        'questionsTypes' => null,
                                      ])

                <div class="form-group">
                    <div class="col-md-offset-2 col-md-10">
                        <input class="btn btn-primary" type="submit" value="Add">
                    </div>
                </div>

            </form>

        </div>
    </div>

@endsection


