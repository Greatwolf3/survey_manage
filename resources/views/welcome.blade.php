@extends('layouts.app')
@section('content')
    @if(count($domande_chiuse)>0)
    <div class="row">
        <div class="col-lg-12 text-center text-success font-weight-bold">
            <h4>Questions Closed</h4>
        </div>
        <div class="col-lg-12">
            @include('partials.domande_chiuse')
        </div>
    </div>
    @else
        <div class="row">
            <div class="col-lg-12 text-center text-danger font-weight-bold">
                <h4>No Questions Closed</h4>
            </div>
        </div>
    @endif
    <div class="row">
        <div class="col-lg-12">
            @include('partials.domande_rimaste')
        </div>
    </div>
@endsection
