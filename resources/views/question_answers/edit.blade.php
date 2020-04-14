@extends('layouts.app')

@section('content')

    <div class="card">
  
        <div class="card-header">

            <div class="float-left">
                <h4 >{{ !empty($title) ? $title : 'Question Answers' }}</h4>
            </div>
            <div class="float-right">

                <a href="{{ route('question_answers.question_answers.index') }}" class="btn btn-primary" title="Show All Question Answers">
                    <i class="fas fa-list"></i>
                </a>

                <a href="{{ route('question_answers.question_answers.create') }}" class="btn btn-success" title="Create New Question Answers">
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

            <form method="POST" action="{{ route('question_answers.question_answers.update', $questionAnswers->id) }}" id="edit_question_answers_form" name="edit_question_answers_form" accept-charset="UTF-8" class="form-horizontal">
            {{ csrf_field() }}
            <input name="_method" type="hidden" value="PUT">
            @include ('question_answers.form', [
                                        'questionAnswers' => $questionAnswers,
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