
<div class="form-group {{ $errors->has('question') ? 'has-error' : '' }}">
    <label for="question" class="col-md-2 control-label">Question</label>
    <div class="col-md-10">
        <textarea class="form-control" name="question" cols="50" rows="10" id="question" required="true" placeholder="Enter question here...">{{ old('question', optional($questions)->question) }}</textarea>
        {!! $errors->first('question', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('description') ? 'has-error' : '' }}">
    <label for="description" class="col-md-2 control-label">Description</label>
    <div class="col-md-10">
        <textarea class="form-control" name="description" cols="50" rows="10" id="description" required="true">{{ old('description', optional($questions)->description) }}</textarea>
        {!! $errors->first('description', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('answer_type') ? 'has-error' : '' }}">
    <label for="answer_type" class="col-md-2 control-label">Answer Type</label>
    <div class="col-md-10">
        <select class="form-control" id="answer_type" name="answer_type" required="true">
        	    <option value="" style="display: none;" {{ old('answer_type', optional($questions)->answer_type ?: '') == '' ? 'selected' : '' }} disabled selected>Enter answer type here...</option>
        	@foreach ($QuestionsTypes as $key => $QuestionsType)
			    <option value="{{ $key }}" {{ old('answer_type', optional($questions)->answer_type) == $key ? 'selected' : '' }}>
			    	{{ $QuestionsType }}
			    </option>
			@endforeach
        </select>
        
        {!! $errors->first('answer_type', '<p class="help-block">:message</p>') !!}
    </div>
</div>

