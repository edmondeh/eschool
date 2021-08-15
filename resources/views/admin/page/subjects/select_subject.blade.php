	<select class="form-control" name="subject_id" required>
		<option value="">Select subject</option>
        @foreach($subjects as $subject)
		<option value="{{ $subject->id }}">{{ $subject->name }}</option>
		@endforeach
    </select>
    </div>
    @if($errors->has('subject_id'))
        <p class="help-block">
            {{ $errors->first('subject_id') }}
        </p>
    @endif
    <script>
        $('select').selectpicker();
    </script>