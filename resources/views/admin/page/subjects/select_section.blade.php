	<select class="form-control" name="section_id" onchange="select_subject({{ $sections[0]->classes->dep_id }},{{ $sections[0]->class_id }} , this.value)" required>
		<option value="">Select section</option>
        @foreach($sections as $section)
		<option value="{{ $section->id }}">{{ $section->name }}</option>
		@endforeach
    </select>
    </div>
    @if($errors->has('section_id'))
        <p class="help-block">
            {{ $errors->first('section_id') }}
        </p>
    @endif
    <script>
        $('select').selectpicker();
    </script>