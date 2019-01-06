@extends('front.templates.main')

@section('title', 'Giphies of #'.$tag->name)

@section('css')
    <link rel="stylesheet" href="/css/frontend/tag-show.css">
@endsection

@section('content')    
    <search-autocomplete></search-autocomplete>
    <best-tags></best-tags>

    <div class="row results">
        <div class="container text-border">
            <div class="row results-info">
                <span>
                    {{ $tag->giphies->count() }}
                </span>
                results for <strong>#{{ $tag->name }}</strong>
            </div>
            <div class="row">
                @foreach ($tag->giphies as $giphy)
                    <div class="col-lg-3">
                        <giphie-card :giphy="{{ $giphy }}"></giphie-card>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
