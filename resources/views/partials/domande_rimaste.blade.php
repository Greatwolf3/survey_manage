
@foreach($domande_rimaste as $domanda)
    <div class="row mt-3">
        <div class="col-lg-12 mb-3">
            <div class="card bg-light " >
                <div class="card-header">
                    <div class="error text-center alert-danger"></div>
                    {{ $domanda->id }} {{ $domanda->question }}

                </div>
                <div class="card-body">
                    @switch($domanda->answer_type)
                        @case(1)
                        <form method="post" action="{{ route('save_question') }}">
                            {{ csrf_field() }}
                            <input type="hidden" name="domanda" id="domanda_{{ $domanda->id }}" value="{{ $domanda->id }}">
                            <input type="hidden" name="tipo_domanda" id="tipo_domanda_{{ $domanda->id }}" value="multi">
                            @include('partials.risposte_multi')
                            <div class="form-group text-right py-0 mb-0">
                                <button type="submit" class="btn btn-outline-info" value="">Submit</button>
                            </div>
                        </form>
                        @break
                        @case(2)
                        <form method="post" action="{{ route('save_question') }}">
                            {{ csrf_field() }}
                            <input type="hidden" name="domanda" id="domanda_{{ $domanda->id }}" value="{{ $domanda->id }}">
                            <input type="hidden" name="tipo_domanda" id="tipo_domanda_{{ $domanda->id }}" value="single">
                            @include('partials.risposte_single')
                            <div class="form-group text-right py-0 mb-0">
                                <button type="submit" class="btn btn-outline-info" value="">Submit</button>
                            </div>
                        </form>
                        @break
                        @case(3)
                        @include('partials.risposte_testo')
                        @break
                    @endswitch
                </div>
            </div>
        </div>

    </div>

@endforeach
