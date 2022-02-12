@extends('layouts.base')

@section('PageTitle')
    Comics List
@endsection

@section('PageContent')
    <div class="container position-relative">

      <header class="d-flex justify-content-between align-items-center px-3">
        <h1 class="title my-4 text-uppercase">Comics List</h1>
        <a href="{{route('comics.create')}}">
          <button type="button" class="btn btn-success">Nuovo</button>
        </a>
      </header>
      <table class="table">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Titolo</th>
              <th scope="col">Serie</th>
              <th scope="col">Tipo</th>
              <th scope="col">Prezzo</th>
              <th scope="col"></th>
              <th scope="col"></th>
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
                  <td>
                    <a href="{{route('comics.edit', $comic->id)}}">
                      <button type="button" class="btn btn-warning">Modifica</button>
                    </a>
                  </td>
                  <td>
                    <button type="submit" id="{{$comic->id}}" class="btn btn-danger delete_btn">Cancella</button>

                    <div class="alert_delete alert_delete_{{$comic->id}} display_none">
                      <span>L'elemento selezionato verrà eliminato definitivamente. Procedere con l'eliminazione?</span>

                      <div class="buttons">
                        <button type="button" class="btn btn-success cancel_btn">Annulla</button>

                        <form class="d-inline-block" action="{{route('comics.destroy', $comic->id)}}" method="POST">
                          @csrf
                          @method('DELETE')
                      
                          <button type="submit" class="btn btn-danger">Elimina</button>
                          
                        </form>
                      </div>
                    </div>
                  </td>
              </tr>
            @endforeach
          </tbody>
        </table>
    </div>
@endsection

