@extends('layouts.root')

@section('title')
  <title>{{ config('app.name', 'Laravel') }} - Search</title>
@endsection

@section('content')
	<form action="{{ route('search.index') }}" method="GET">
    <div class="form-group row">
        <div class="col-12">
            <h4 class="d-inline-block">Search</h4>
            <span class="float-right">
                <button type="submit" class="btn btn-primary">
          					<i class="fa fa-search"></i>
          					Search
        				</button>
            </span>
        </div>
    </div>
    <div class="form-group row">
        <div class="col-lg-12">
            <div class="text-center">
                @component('generic.input.checkall', [
                    'text'    => 'All',
                    'name'    => 'search_terms'
                ])@endcomponent
                @component('generic.input.checkbutton', [
                    'text'    => 'Artists',
                    'name'    => 'search_terms',
                    'value'   => 'artists', 
                    'checked' => array_key_exists('Artists', $selected)
                ])@endcomponent
                @component('generic.input.checkbutton', [
                    'text'    => 'Songs',
                    'name'    => 'search_terms',
                    'value'   => 'songs',
                    'checked' => array_key_exists('Songs', $selected)
                ])@endcomponent
                @component('generic.input.checkbutton', [
                    'text'    => 'Albums',
                    'name'    => 'search_terms',
                    'value'   => 'albums',
                    'checked' => array_key_exists('Albums', $selected)
                ])@endcomponent
                @component('generic.input.checkbutton', [
                    'text'    => 'People',
                    'name'    => 'search_terms',
                    'value'   => 'people',
                    'checked' => array_key_exists('People', $selected)
                ])@endcomponent
            </div>
        </div>
    </div>
		@component('generic.form.text', [
			'name'      =>  'search',
			'label'     =>  'Enter a search term',
			'required'  =>  true,
			'autofocus' =>  true
		])@endcomponent
	</form>
@endsection