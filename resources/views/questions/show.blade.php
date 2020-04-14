@extends('home')

@section('dashboard_content')

<div class="card">
    <div class="card-header">

        <span class="float-left">
            <h4 >{{ isset($title) ? $title : 'Questions' }}</h4>
        </span>

        <div class="float-right">

            <form method="POST" action="{!! route('questions.questions.destroy', $questions->id) !!}" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            {{ csrf_field() }}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('questions.questions.index') }}" class="btn btn-primary" title="Show All Questions">
                        <i class="fas fa-list"></i>
                    </a>

                    <a href="{{ route('questions.questions.create') }}" class="btn btn-success" title="Create New Questions">
                        <i class="fas fa-plus"></i>
                    </a>
                    
                    <a href="{{ route('questions.questions.edit', $questions->id ) }}" class="btn btn-primary" title="Edit Questions">
                        <i class="fas fa-pencil-alt"></i>
                    </a>

                    <button type="submit" class="btn btn-danger" title="Delete Questions" onclick="return confirm(&quot;Click Ok to delete Questions.?&quot;)">
                        <i class="fas fa-trash"></i>
                    </button>
                </div>
            </form>

        </div>

    </div>

    <div class="card-body">
        <dl class="dl-horizontal">
            <dt>Question</dt>
            <dd>{{ $questions->question }}</dd>
            <dt>Description</dt>
            <dd>{{ $questions->description }}</dd>
            <dt>Answer Type</dt>
            <dd>{{ optional($questions->QuestionsType)->titolo }}</dd>
            <dt>Created At</dt>
            <dd>{{ $questions->created_at }}</dd>
            <dt>Updated At</dt>
            <dd>{{ $questions->updated_at }}</dd>

        </dl>

    </div>
</div>

@endsection