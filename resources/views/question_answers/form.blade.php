
<div class="form-group {{ $errors->has('id_question') ? 'has-error' : '' }}">
    <label for="id_question" class="col-md-2 control-label">Id Question</label>
    <div class="col-md-10">
        <select class="form-control" id="id_question" name="id_question" required="true">
        	    <option value="" style="display: none;" {{ old('id_question', optional($questionAnswers)->id_question ?: '') == '' ? 'selected' : '' }} disabled selected>Enter id question here...</option>
        	@foreach ($Questions as $key => $Question)
			    <option value="{{ $key }}" {{ old('id_question', optional($questionAnswers)->id_question) == $key ? 'selected' : '' }}>
			    	{{ $Question }}
			    </option>
			@endforeach
        </select>
        
        {!! $errors->first('id_question', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('testo') ? 'has-error' : '' }}">
    <label for="testo" class="col-md-2 control-label">Testo</label>
    <div class="col-md-10">
        <textarea class="form-control" name="testo" cols="50" rows="10" id="testo" required="true" placeholder="Enter testo here...">{{ old('testo', optional($questionAnswers)->testo) }}</textarea>
        {!! $errors->first('testo', '<p class="help-block">:message</p>') !!}
    </div>
</div>

