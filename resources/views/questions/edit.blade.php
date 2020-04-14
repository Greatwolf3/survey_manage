@extends('home')

@section('dashboard_content')

    <div class="card">
  
        <div class="card-header">

            <div class="float-left">
                <h4 >{{ !empty($title) ? $title : 'Questions' }}</h4>
            </div>
            <div class="float-right">

                <a href="{{ route('questions.questions.index') }}" class="btn btn-primary" title="Show All Questions">
                    <i class="fas fa-list"></i>
                </a>

                <a href="{{ route('questions.questions.create') }}" class="btn btn-success" title="Create New Questions">
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

            <form method="POST" action="{{ route('questions.questions.update', $questions->id) }}" id="edit_questions_form" name="edit_questions_form" accept-charset="UTF-8" class="form-horizontal">
            {{ csrf_field() }}
            <input name="_method" type="hidden" value="PUT">
            @include ('questions.form', [
                                        'questions' => $questions,
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