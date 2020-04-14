@foreach($domanda->risposte_disponibili as $key=>$risposta)
    <div class="row">
        <div class="col-lg-8 offset-lg-2">
            <div class="form-check">
                <input class="form-check-input" type="radio" value="{{ $risposta->id }}" name="risp[]" id="risp_{{ $domanda->id }}" question="{{ $domanda->id }}">
                <label class="form-check-label" for="risp">
                    {{ $risposta->testo }}
                </label>

            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>


    <script>
        var error = "{{ $errors }}";
        if (error) {
            var init = error.indexOf('-');
            var last = error.indexOf(' ');
            var strlength = last - init;
            var question = error.substr((init + 1), strlength);
            jQuery('input[question=' + question + ']').closest('.card-header').append(error);
            jQuery('input[question=' + question + ']').closest('.card').css('border', '2px solid red');
        }
    </script>

@endforeach
