@extends('layouts.app')

@section('content')

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
                <h4>Questions Types</h4>
            </div>

            <div class="float-right">
                <a href="{{ route('questions_types.questions_types.create') }}" class="btn btn-success" title="Create New Questions Types">
                    <i class="fas fa-plus"></i>
                </a>
            </div>

        </div>
        
        @if(count($questionsTypesObjects) == 0)
            <div class="card-body text-center">
                <h4>No Questions Types Available.</h4>
            </div>
        @else
        <div class="card-body card-body-with-table">
            <div class="table-responsive">

                <table class="table table-striped ">
                    <thead>
                        <tr>
                            <th>Titolo</th>

                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($questionsTypesObjects as $questionsTypes)
                        <tr>
                            <td>{{ $questionsTypes->titolo }}</td>

                            <td>

                                <form method="POST" action="{!! route('questions_types.questions_types.destroy', $questionsTypes->id) !!}" accept-charset="UTF-8">
                                <input name="_method" value="DELETE" type="hidden">
                                {{ csrf_field() }}

                                    <div class="btn-group btn-group-xs pull-right" role="group">
                                        <a href="{{ route('questions_types.questions_types.show', $questionsTypes->id ) }}" class="btn btn-info" title="Show Questions Types">
                                             <i class="fas fa-folder-open"></i>
                                        </a>
                                        <a href="{{ route('questions_types.questions_types.edit', $questionsTypes->id ) }}" class="btn btn-primary" title="Edit Questions Types">
                                            <i class="fas fa-pencil-alt"></i>
                                        </a>

                                        <button type="submit" class="btn btn-danger" title="Delete Questions Types" onclick="return confirm(&quot;Click Ok to delete Questions Types.&quot;)">
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
            {!! $questionsTypesObjects->render() !!}
        </div>
        
        @endif
    
    </div>
@endsection