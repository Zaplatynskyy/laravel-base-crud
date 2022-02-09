@extends('layouts.base')

@section('PageTitle')
    Comics List
@endsection

@section('PageContent')
    <div class="container">
        <h1 class="title my-4 text-uppercase">Comics List</h1>
        <table class="table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Titolo</th>
                <th scope="col">Serie</th>
                <th scope="col">Tipo</th>
                <th scope="col">Prezzo</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($comics as $comic)
                <tr>
                    <th>{{$comic->id}}</th>
                    <td><a href="{{route('comics.show',$comic->id)}}"><strong>{{$comic->title}}</strong></a></td>
                    <td>{{$comic->series}}</td>
                    <td>{{$comic->type}}</td>
                    <td>{{$comic->price}} $</td>
                </tr>
              @endforeach
            </tbody>
          </table>
    </div>
@endsection