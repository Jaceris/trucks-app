<div class="row">
  <h3>{{ __('Trucks filter') }}</h3>
  <form action="{{ route('truck.filter') }}" method="post">
    @csrf
    <div class="col-lg-2">
      <div class="form-group {{ $errors->has('brand') ? 'has-error' : '' }}">
        <label for="brand" class="control-label">{{ __('By brand') }}</label>
        <select class="form-control" id="brand" name="brand">
          <option value="" {{ old('brand') ? 'selected' : ''}}>{{ __('Select truck brand') }}</option>
            @foreach($brands as $key => $brand)
              <option value="{{ $key }}" {{ old('brand') == $key ? 'selected' : ''}}>{{ $brand }}</option>
            @endforeach
        </select>
        @error('brand')
          <div class="text-danger" >{{ $errors->first('brand') }}</div>
        @enderror
      </div>
    </div>
    <div class="col-lg-2">
      <div class="form-group {{ $errors->has('year_from') ? 'has-error' : '' }}">
        <label for="year_from" class="control-label">{{ __('Year from') }}</label>
        <input class="form-control has-error" step="1" min="{{ config('truck.min_year') }}" max="date('Y')" name="year_from" type="number" id="year_from" value="{{ old('year_from') }}">
        @error('year_from')
          <div class="text-danger" >{{ $errors->first('year_from') }}</div>
        @enderror
      </div>
    </div>
    <div class="col-lg-2">
      <div class="form-group {{ $errors->has('year_to') ? 'has-error' : '' }}">
        <label for="year_to" class="control-label">{{ __('Year to') }}</label>
        <input class="form-control" step="1" min="{{ config('truck.min_year') }}" max="{{ date('Y') }}" name="year_to" type="number" id="year_to" value="{{ old('year_to') }}">
        @error('year_to')
          <div class="text-danger" >{{ $errors->first('year_to') }}</div>
        @enderror
      </div>
    </div>
    <div class="col-lg-6">
      <div class="form-group {{ $errors->has('owner') ? 'has-error' : '' }}">
        <label for="owner" class="control-label">{{ __('By owner') }}</label>
        <input class="form-control" name="owner" type="text" id="owner" value="{{ old('owner') }}">
        @error('owner')
          <div class="text-danger" >{{ $errors->first('owner') }}</div>
        @enderror
      </div>
    </div>
    <div class="col-lg-2">
      <div class="form-group {{ $errors->has('owners_count_from') ? 'has-error' : '' }}">
        <label for="owners_count_from" class="control-label">{{ __('Owners count from') }}</label>
        <input class="form-control" step="1" min="0" name="owners_count_from" type="number" id="owners_count_from" value="{{ old('owners_count_from') }}">
        @error('owners_count_from')
          <div class="text-danger" >{{ $errors->first('owners_count_from') }}</div>
        @enderror
      </div>
    </div>
    <div class="col-lg-2">
      <div class="form-group {{ $errors->has('owners_count_to') ? 'has-error' : '' }}">
        <label for="owners_count_to" class="control-label">{{ __('Owners count to') }}</label>
        <input class="form-control" step="1" min="0" name="owners_count_to" type="number" id="owners_count_to" value="{{ old('owners_count_to') }}">
        @error('owners_count_to')
          <div class="text-danger" >{{ $errors->first('owners_count_to') }}</div>
        @enderror
      </div>
    </div>
    <div class="col-lg-2">
      <div class="form-group">
        <label for="sort_by" class="control-label">{{ __('Sort by') }}</label>
        <select class="form-control" id="sort_by" name="sort_by">
            @foreach($sorts as $value)
              <option value="{{ $value }}" {{ old('sort_by') == $value ? 'selected' : '' }}>{{ $value }}</option>
            @endforeach
        </select>
      </div>
    </div>
    <div class="col-lg-2">
      <div class="form-group">
        <label for="sort_type" class="control-label">{{ __('Sort type') }}</label>
        <select class="form-control" id="sort_type" name="sort_type">
          <option value="asc" {{ old('sort_type') == 'asc' ? 'selected' : '' }}>{{ __('Ascending') }}</option>
          <option value="desc" {{ old('sort_type') == 'desc' ? 'selected' : '' }}>{{ __('Descending') }}</option>
        </select>
      </div>
    </div>
    <div class="col-lg-2">
      <div class="form-group">
        <label for="submitFilter"></label>
        <button type="submit" class="form-control btn btn-primary" id="submitFilter">{{ __('Filter') }}</button>
      </div>
    </div>
  </form>
</div>
<hr>
