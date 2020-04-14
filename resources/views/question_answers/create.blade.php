@extends('layouts.app')

@section('content')

    <div class="card ">

        <div class="card-header">
            
            <span class="float-left">
                <h4>Create New Question Answers</h4>
            </span>

            <div class="float-right">
                <a href="{{ route('question_answers.question_answers.index') }}" class="btn btn-primary" title="Show All Question Answers">
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

            <form method="POST" action="{{ route('question_answers.question_answers.store') }}" accept-charset="UTF-8" id="create_question_answers_form" name="create_question_answers_form" class="form-horizontal">
            {{ csrf_field() }}
            @include ('question_answers.form', [
                                        'questionAnswers' => null,
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


