@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                   <h1>Maak een nieuw event!</h1>

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('event.store')  }}" method="POST">
                        @csrf

                        <div class="form-group">
                            <input type="text" name="name" value="{{ old('name') }}" class="form-control" placeholder="Naam">
                        </div>

                        <div class="form-group">
                            <input type="date" name="date" value="{{ old('date') }}" class="form-control">
                        </div>

                        <div class="form-group">
                            <input class="btn btn-primary" type="submit" value="Opslaan">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
