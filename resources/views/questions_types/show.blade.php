@extends('layouts.app')

@section('content')

<div class="card">
    <div class="card-header">

        <span class="float-left">
            <h4 >{{ isset($title) ? $title : 'Questions Types' }}</h4>
        </span>

        <div class="float-right">

            <form method="POST" action="{!! route('questions_types.questions_types.destroy', $questionsTypes->id) !!}" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            {{ csrf_field() }}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('questions_types.questions_types.index') }}" class="btn btn-primary" title="Show All Questions Types">
                        <i class="fas fa-list"></i>
                    </a>

                    <a href="{{ route('questions_types.questions_types.create') }}" class="btn btn-success" title="Create New Questions Types">
                        <i class="fas fa-plus"></i>
                    </a>
                    
                    <a href="{{ route('questions_types.questions_types.edit', $questionsTypes->id ) }}" class="btn btn-primary" title="Edit Questions Types">
                        <i class="fas fa-pencil-alt"></i>
                    </a>

                    <button type="submit" class="btn btn-danger" title="Delete Questions Types" onclick="return confirm(&quot;Click Ok to delete Questions Types.?&quot;)">
                        <i class="fas fa-trash"></i>
                    </button>
                </div>
            </form>

        </div>

    </div>

    <div class="card-body">
        <dl class="dl-horizontal">
            <dt>Titolo</dt>
            <dd>{{ $questionsTypes->titolo }}</dd>
            <dt>Created At</dt>
            <dd>{{ $questionsTypes->created_at }}</dd>
            <dt>Updated At</dt>
            <dd>{{ $questionsTypes->updated_at }}</dd>

        </dl>

    </div>
</div>

@endsection