	<select class="form-control" name="class_id" onchange="select_section(this.value)" required>
		<option value="">Select class</option>
        @foreach($classes as $classe)
		<option value="{{ $classe->id }}">{{ $classe->name }}</option>
		@endforeach
    </select>
    </div>
    @if($errors->has('class_id'))
        <p class="help-block">
            {{ $errors->first('class_id') }}
        </p>
    @endif
    <script>
        $('select').selectpicker();
    </script>