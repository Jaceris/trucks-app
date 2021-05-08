<div class="row">
  <h3>{{ __('Trucks filter') }}</h3>
  <form>
    <div class="col-lg-2">
      <div class="form-group">
        <label for="brand" class="control-label">{{ __('By brand') }}</label>
        <select class="form-control" pattern="\d+" id="brand" name="brand">
          <option value="" selected="selected">{{ __('Select truck brand') }}</option>
            @foreach($brands as $key => $brand)
              <option value="{{ $key }} ">{{ $brand }}</option>
            @endforeach
        </select>
      </div>
    </div>
    <div class="col-lg-2">
      <div class="form-group">
        <label for="year_from" class="control-label">{{ __('Year from') }}</label>
        <input class="form-control" step="1" min="1900" max="2021" name="year_from" type="number" id="year_from">
      </div>
    </div>
    <div class="col-lg-2">
      <div class="form-group">
        <label for="year_to" class="control-label">{{ __('Year to') }}</label>
        <input class="form-control" step="1" min="1900" max="2021" name="year_to" type="number" id="year_to">
      </div>
    </div>
    <div class="col-lg-6">
      <div class="form-group">
        <label for="owner" class="control-label">{{ __('By owner') }}</label>
        <input class="form-control" name="owner" type="text" id="owner">
      </div>
    </div>
    <div class="col-lg-2">
      <div class="form-group">
        <label for="owners_count_from" class="control-label">{{ __('Owners count from') }}</label>
        <input class="form-control" step="1" min="1" name="owners_count_from" type="number" id="owners_count_from">
      </div>
    </div>
    <div class="col-lg-2">
      <div class="form-group">
        <label for="owners_count_to" class="control-label">{{ __('Owners count to') }}</label>
        <input class="form-control" step="1" min="1" name="owners_count_to" type="number" id="owners_count_to">
      </div>
    </div>
    <div class="col-lg-2">
      <div class="form-group">
        <label for="sortBy" class="control-label">{{ __('Sort by') }}</label>
        <select class="form-control" id="sortBy" name="sortBy">
            @foreach($sorts as $value)
              <option value="{{ $value }}">{{ $value }}</option>
            @endforeach
        </select>
      </div>
    </div>
    <div class="col-lg-2">
      <div class="form-group">
        <label for="sortType" class="control-label">{{ __('Sort type') }}</label>
        <select class="form-control" id="sortType" name="sortType">
          <option value="asc" selected="selected">{{ __('Ascending') }}</option>
          <option value="desc" >{{ __('Descending') }}</option>
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