@extends('layouts.admin')

@section('content')
    <div class="container">
        <h2 class="mt-3 text-center">Lista delle tecnologie</h2>

        <div class="row row-cols-2">
            <div class="col">
                {{-- Message --}}
                @if (session('message'))
                    <div class="alert alert-success">
                        {{ session('message') }}
                    </div>
                @endif
                {{-- /Message --}}
                <form action="{{route('admin.technologies.store')}}" method="POST" class="mt-3">
                    @csrf
                    <div class="input-group mb-3">
                        <input name="name" type="text" class="form-control" placeholder="Aggiungi una nuova tecnologia" aria-label="Aggiungi una nuova tecnologia" aria-describedby="create-technology">
                        <button class="btn btn-outline-secondary" type="submit" id="create-technology-btn">Invia</button>
                    </div>
                </form>
            </div>

            <div class="col">
                <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">Tecnologia</th>
                        <th scope="col">Numero dei progetti</th>
                        <th scope="col">Azioni</th>
                      </tr>
                    </thead>
                    <tbody>
                    @forelse ($technologies as $technology)
                    <tr>
                        <th scope="row">{{ $technology->name}}</th>
                        <td></td>
                        {{-- <td>{{ count($technology->projects) }}</td> --}}
                        <td>Azioni</td>
                    </tr>
                    @empty
                    <p>Nessuna categoria presente</p>
                    @endforelse
                
                    </tbody>
                  </table>
            </div>
        </div>
    </div>
@endsection