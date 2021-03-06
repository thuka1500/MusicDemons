@extends('layouts.root')

@section('title')
  <title>{{ config('app.name', 'Laravel') }} - Login</title>
@endsection

@section('content')
	<h1>Login</h1>
	<form action="{{ route('login') }}" method="POST">
		{{ csrf_field() }}
		@component('generic.form.text', [
			'name'      =>  'email',
			'label'     =>  'Email address',
			'required'  =>  true,
			'autofocus' =>  true
		])@endcomponent
		@component('generic.form.password', [
			'name'      =>  'password',
			'label'     =>  'Password',
			'required'  =>  true
		])@endcomponent
		@component('generic.form.togglebutton', [
			'label'  => 'Remember me',
			'name'   => 'remember',
			'value'  => 0
		])@endcomponent
		<div class="row">
			<div class="col-12 text-center">
				<button type="submit" class="btn btn-primary">
					<i class="fa fa-sign-in"></i>
					Login
				</button>
        <a href="{{ route('password.request') }}" class="btn btn-default">
					<i class="fa fa-question-circle-o"></i>
					Forgot password
        </a>
			</div>
		</div>
	</form>
@endsection