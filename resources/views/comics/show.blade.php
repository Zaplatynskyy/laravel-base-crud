@extends('layouts.base')

@section('PageTitle')
    {{$comic->title}}
@endsection

@section('PageContent')
    <div class="container">
        <div class="card m-5 p-4">

            <h2 class="title_comic mb-3 text-center">{{$comic->title}}</h2>

            <div class="d-flex">
                <img class="mr-3" src="{{$comic->thumb}}" alt="{{$comic->title}}">
                <div class="info_comic">
                    <p>{{$comic->description}}</p>
                    <div class="info_sale">
                        <span class="font-weight-bold">{{$comic->series}}</span>
                        <span>{{$comic->sale_date}}</span>
                        <div class="font-weight-bold">{{$comic->price}} $</div>
                        <a href="{{route('comics.index')}}">
                            <button type="button" class="btn btn-primary">Home</button>
                        </a>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection