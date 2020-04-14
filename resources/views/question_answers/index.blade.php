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
                <h4>Question Answers</h4>
            </div>

            <div class="float-right">
                <a href="{{ route('question_answers.question_answers.create') }}" class="btn btn-success" title="Create New Question Answers">
                    <i class="fas fa-plus"></i>
                </a>
            </div>

        </div>
        
        @if(count($questionAnswersObjects) == 0)
            <div class="card-body text-center">
                <h4>No Question Answers Available.</h4>
            </div>
        @else
        <div class="card-body card-body-with-table">
            <div class="table-responsive">

                <table class="table table-striped ">
                    <thead>
                        <tr>
                            <th>Id </th>
                            <th>Question</th>
                            <th>Options</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($questionAnswersObjects as $questionAnswers)
                        <tr>
                            <td>{{ $questionAnswers->id }}</td>
                            <td>{{ $questionAnswers->Question->id. " - ".$questionAnswers->Question->question }}</td>
                            <td>

                                <form method="POST" action="{!! route('question_answers.question_answers.destroy', $questionAnswers->id) !!}" accept-charset="UTF-8">
                                <input name="_method" value="DELETE" type="hidden">
                                {{ csrf_field() }}

                                    <div class="btn-group btn-group-xs pull-right" role="group">
                                        <a href="{{ route('question_answers.question_answers.show', $questionAnswers->id ) }}" class="btn btn-info" title="Show Question Answers">
                                             <i class="fas fa-folder-open"></i>
                                        </a>
                                        <a href="{{ route('question_answers.question_answers.edit', $questionAnswers->id ) }}" class="btn btn-primary" title="Edit Question Answers">
                                            <i class="fas fa-pencil-alt"></i>
                                        </a>

                                        <button type="submit" class="btn btn-danger" title="Delete Question Answers" onclick="return confirm(&quot;Click Ok to delete Question Answers.&quot;)">
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
            {!! $questionAnswersObjects->render() !!}
        </div>
        
        @endif
    
    </div>
@endsection