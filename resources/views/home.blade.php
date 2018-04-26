@extends('layouts.app')

@section('title')
    Ik ga mee
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                   <h2>Maak een nieuw event!</h2>

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('event.store')  }}" method="POST" class="mb-0">
                        @csrf

                        <div class="form-group">
                            <label for="name" class="bmd-label-floating">Naam</label>
                            <input type="text" name="name" value="{{ old('name') }}" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="date" class="bmd-label-floating">Datum</label>
                            <input type="date" name="date" value="{{ old('date', date('Y-m-d')) }}" class="form-control" required min="{{ date('Y-m-d') }}">
                        </div>

                        <div class="form-group">
                            <label for="email" class="bmd-label-floating">Email (optioneel)</label>
                            <input type="email" name="email" value="{{ old('email') }}" class="form-control">
                        </div>

                        <button class="btn btn-primary btn-raised" type="submit">Opslaan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @if(count($recentEvents) > 0)
    <div class="row justify-content-center py-4">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <h2>Onlangs bezocht</h2>

                    @foreach($recentEvents as $event)
                        <a href="{{ $event->link }}">
                            {{ $event->name }} op {{ $event->date->format('d-m-Y') }}
                        </a>
                        <br>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    @endif
</div>
@endsection
