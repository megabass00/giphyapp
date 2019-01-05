@extends('front.templates.main')

@section('title', 'Giphy List')

@section('content')    
    <search-autocomplete></search-autocomplete>
    <list-of-giphies></list-of-giphies>
@endsection
