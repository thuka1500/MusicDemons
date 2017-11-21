@extends('layouts.root')

@section('content')
	<form action="{{ route('song.update',$song->id) }}" method="POST">
		{{ csrf_field() }}
    {{ method_field('PUT') }}
    <div class="form-group row">
        <div class="col-12">
            <h4 class="d-inline-block">Edit song: {{ $song->title }}</h4>
            <span class="float-right">
        				<button type="submit" class="btn btn-primary">
        					<i class="fa fa-save"></i>
        					Update song
        				</button>
            </span>
        </div>
    </div>
    @component('generic.form.text',[
        'name'      =>  'title',
        'label'     =>  'Title',
        'value'     =>  $song->title,
        'required'  =>  true,
        'autofocus' =>  true
    ])@endcomponent
    @component('generic.form.date',[
        'name'      =>  'released',
        'label'     =>  'Released',
        'value'     =>  $song->released
    ])@endcomponent
		<div class="form-group row">
			<label for="artists" class="col-sm-4 col-xl-2">Artists</label>
			<div class="col-sm-8 col-xl-10">
				<select class="form-control select2" name="artists[]" id="artists" data-placeholder="Artists" data-url="{{ route('autocomplete-select2artist', ['search' => '']) }}" data-selected="{!! $selected_artists_string !!}" multiple>
				</select>
			</div>
		</div>
    <div class="form-group row">
      <label for="lyrics" class="col-sm-4 col-xl-2">Lyrics</label>
			<div class="col-sm-8 col-xl-10">
        <textarea class="form-control" rows="15" name="lyrics" id="lyrics">{{
          $song->lyrics->count() === 0 ?
          '' :
          $song->lyrics->last()->lyrics
        }}</textarea>
      </div>
    </div>
    <div class="form-group row">
      <label class="col-sm-4 col-xl-2">Media</label>
      <div class="col-sm-8 col-xl-10">
          @component('subject.media',[
              'medium_types'  => $medium_types,
              'media'         => $song->subject->media
          ])@endcomponent
      </div>
    </div>
	</form>
@endsection

@section('javascript')
    @include('subject.media_js')
@endsection