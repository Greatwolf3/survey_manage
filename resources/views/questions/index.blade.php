@extends('home')

@section('dashboard_content')

    @if(Session::has('success_message'))
        <div class="alert alert-success">
            <span class="glyphicon glyphicon-ok"></span>
            {!! session('success_message') !!}

            <button type="button" class="close" data-dismiss="alert" aria-label="close">
                <span aria-hidden="true">&times;</span>
            </button>

        </div>
    @endif

    <div class="card">

        <div class="card-header">

            <div class="float-left">
                <h4>Questions</h4>
            </div>

            <div class="float-right">
                <a href="{{ route('questions.questions.create') }}" class="btn btn-success" title="Create New Questions">
                    <i class="fas fa-plus"></i>
                </a>
            </div>

        </div>
        
        @if(count($questionsObjects) == 0)
            <div class="card-body text-center">
                <h4>No Questions Available.</h4>
            </div>
        @else
        <div class="card-body card-body-with-table">
            <div class="table-responsive">

                <table class="table table-striped ">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Question</th>
                            <th>Question type</th>
                            <th>Count response list</th>
                            <th>Options</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($questionsObjects as $questions)
                        <tr>
                            <td>{{ $questions->id }}</td>
                            <td>{!! $questions->question !!}</td>
                            <td> {{ $questions->answer_type_name }}</td>
                            <td><a href="{{ route('answers.answers.index_partial',$questions->id) }}">{{ $questions->count_answers_list }}</a></td>

                            <td>

                                <form method="POST" action="{!! route('questions.questions.destroy', $questions->id) !!}" accept-charset="UTF-8">
                                <input name="_method" value="DELETE" type="hidden">
                                {{ csrf_field() }}

                                    <div class="btn-group btn-group-xs pull-right" role="group">
                                        <a href="{{ route('questions.questions.show', $questions->id ) }}" class="btn btn-info" title="Show Questions">
                                             <i class="fas fa-folder-open"></i>
                                        </a>
                                        <a href="{{ route('questions.questions.edit', $questions->id ) }}" class="btn btn-primary" title="Edit Questions">
                                            <i class="fas fa-pencil-alt"></i>
                                        </a>

                                        <button type="submit" class="btn btn-danger" title="Delete Questions" onclick="return confirm(&quot;Click Ok to delete Questions.&quot;)">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </div>

                                </form>
                                
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

            </div>
        </div>

        <div class="card-footer">
            {!! $questionsObjects->render() !!}
        </div>
        
        @endif
    
    </div>
@endsection