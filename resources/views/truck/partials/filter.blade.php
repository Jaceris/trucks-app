<div class="row">
  <h3>{{ __('Trucks filter') }}</h3>
  <form>
    <div class="col-lg-2">
      <div class="form-group">
        <label for="brand" class="control-label">{{ __('By brand') }}</label>
        <select class="form-control" id="brand" name="brand">
          <option value="">{{ __('Select truck brand') }}</option>
            @foreach($brands as $key => $brand)
              <option value="{{ $key }}" {{ old('brand') == $key ? 'selected' : ''}}>{{ $brand }}</option>
            @endforeach
        </select>
      </div>
    </div>
    <div class="col-lg-2">
      <div class="form-group">
        <label for="year_from" class="control-label">{{ __('Year from') }}</label>
        <input class="form-control" step="1" min="{{ config('truck.min_year') }}" max="date('Y')" name="year_from" type="number" id="year_from" value="{{ old('year_from') }}">
      </div>
    </div>
    <div class="col-lg-2">
      <div class="form-group">
        <label for="year_to" class="control-label">{{ __('Year to') }}</label>
        <input class="form-control" step="1" min="{{ config('truck.min_year') }}" max="{{ date('Y') }}" name="year_to" type="number" id="year_to" value="{{ old('year_to') }}">
      </div>
    </div>
    <div class="col-lg-6">
      <div class="form-group">
        <label for="owner" class="control-label">{{ __('By owner') }}</label>
        <input class="form-control" name="owner" type="text" id="owner" value="{{ old('owner') }}">
      </div>
    </div>
    <div class="col-lg-2">
      <div class="form-group">
        <label for="owners_count_from" class="control-label">{{ __('Owners count from') }}</label>
        <input class="form-control" step="1" min="1" name="owners_count_from" type="number" id="owners_count_from" value="{{ old('owners_count_from') }}">
      </div>
    </div>
    <div class="col-lg-2">
      <div class="form-group">
        <label for="owners_count_to" class="control-label">{{ __('Owners count to') }}</label>
        <input class="form-control" step="1" min="1" name="owners_count_to" type="number" id="owners_count_to" value="{{ old('owners_count_to') }}">
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
