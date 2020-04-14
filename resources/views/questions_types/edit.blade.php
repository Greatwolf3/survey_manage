@extends('layouts.app')

@section('content')

    <div class="card">
  
        <div class="card-header">

            <div class="float-left">
                <h4 >{{ !empty($title) ? $title : 'Questions Types' }}</h4>
            </div>
            <div class="float-right">

                <a href="{{ route('questions_types.questions_types.index') }}" class="btn btn-primary" title="Show All Questions Types">
                    <i class="fas fa-list"></i>
                </a>

                <a href="{{ route('questions_types.questions_types.create') }}" class="btn btn-success" title="Create New Questions Types">
                    <i class="fas fa-plus"></i>
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

            <form method="POST" action="{{ route('questions_types.questions_types.update', $questionsTypes->id) }}" id="edit_questions_types_form" name="edit_questions_types_form" accept-charset="UTF-8" class="form-horizontal">
            {{ csrf_field() }}
            <input name="_method" type="hidden" value="PUT">
            @include ('questions_types.form', [
                                        'questionsTypes' => $questionsTypes,
                                      ])

                <div class="form-group">
                    <div class="col-md-offset-2 col-md-10">
                        <input class="btn btn-primary" type="submit" value="Update">
                    </div>
                </div>
            </form>

        </div>
    </div>

@endsection