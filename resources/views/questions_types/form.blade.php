
<div class="form-group {{ $errors->has('titolo') ? 'has-error' : '' }}">
    <label for="titolo" class="col-md-2 control-label">Titolo</label>
    <div class="col-md-10">
        <input class="form-control" name="titolo" type="text" id="titolo" value="{{ old('titolo', optional($questionsTypes)->titolo) }}" minlength="1" maxlength="150" required="true" placeholder="Enter titolo here...">
        {!! $errors->first('titolo', '<p class="help-block">:message</p>') !!}
    </div>
</div>

