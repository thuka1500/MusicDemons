@extends('layouts.root')

@section('title')
  <title>{{ config('app.name', 'Laravel') }} - Unauthenticated</title>
@endsection

@section('content')    <div class="error-page">
    <h1 class="headline text-info">301</h1>
    <div class="error-content">
        <h3><i class="fa fa-warning text-yellow"></i> Oops! Unauthenticated.</h3>
        <p>
            Unauthenticated
        </p>
    </div>
@endsection