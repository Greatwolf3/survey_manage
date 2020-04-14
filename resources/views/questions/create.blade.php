@extends('home')

@section('dashboard_content')

    <div class="card ">

        <div class="card-header">
            
            <span class="float-left">
                <h4 class="mt-5 mb-5">Create New Questions</h4>
            </span>

            <div class="float-right">
                <a href="{{ route('questions.questions.index') }}" class="btn btn-primary" title="Show All Questions">
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

            <form method="POST" action="{{ route('questions.questions.store') }}" accept-charset="UTF-8" id="create_questions_form" name="create_questions_form" class="form-horizontal">
            {{ csrf_field() }}
            @include ('questions.form', [
                                        'questions' => null,
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


