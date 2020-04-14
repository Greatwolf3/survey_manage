@extends('layouts.app')

@section('content')

<div class="card">
    <div class="card-header">

        <span class="float-left">
            <h4 >{{ isset($title) ? $title : 'Question Answers' }}</h4>
        </span>

        <div class="float-right">

            <form method="POST" action="{!! route('question_answers.question_answers.destroy', $questionAnswers->id) !!}" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            {{ csrf_field() }}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('question_answers.question_answers.index') }}" class="btn btn-primary" title="Show All Question Answers">
                        <i class="fas fa-list"></i>
                    </a>

                    <a href="{{ route('question_answers.question_answers.create') }}" class="btn btn-success" title="Create New Question Answers">
                        <i class="fas fa-plus"></i>
                    </a>
                    
                    <a href="{{ route('question_answers.question_answers.edit', $questionAnswers->id ) }}" class="btn btn-primary" title="Edit Question Answers">
                        <i class="fas fa-pencil-alt"></i>
                    </a>

                    <button type="submit" class="btn btn-danger" title="Delete Question Answers" onclick="return confirm(&quot;Click Ok to delete Question Answers.?&quot;)">
                        <i class="fas fa-trash"></i>
                    </button>
                </div>
            </form>

        </div>

    </div>

    <div class="card-body">
        <dl class="dl-horizontal">
            <dt>Id Question</dt>
            <dd>{{ optional($questionAnswers->Question)->question }}</dd>
            <dt>Testo</dt>
            <dd>{{ $questionAnswers->testo }}</dd>
            <dt>Created At</dt>
            <dd>{{ $questionAnswers->created_at }}</dd>
            <dt>Updated At</dt>
            <dd>{{ $questionAnswers->updated_at }}</dd>

        </dl>

    </div>
</div>

@endsection