@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <h2>Wie gaat er mee naar {{ $event->name }}?</h2>
                        <h4>{{ $event->date->format('d F Y') }}</h4>

                            @forelse($event->attendees as $attendee)

                                @if($attendee->attends)
                                    <i class="fas fa-check text-success"></i>
                                @else
                                    <i class="fas fa-times text-danger"></i>
                                @endif

                                {{ $attendee->name }}

                                <br>
                            @empty
                                Nog niemand :(
                            @endforelse

                        <p class="text-muted pt-4 mb-0">
                            Share:
                            <a href="whatsapp://send?text={{ $shareText }}" class="text-muted d-block d-sm-none">
                                <i class="fab fa-whatsapp"></i> Whatsapp
                            </a>
                            <a href="mailto:?subject=Ga%20jij%20mee%3F&body={{ $shareText }}" class="text-muted">
                                <i class="far fa-envelope"></i> Email
                            </a>
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <div class="row justify-content-center py-4">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">

                        <h2>Ga jij mee naar {{ $event->name }}?</h2>

                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form action="{{ route('attendee.store')  }}" method="POST">
                            @csrf
                            <input type="hidden" name="event_hash" value="{{ $event->hash }}">
                            <div class="form-group">
                                <input type="text" name="name" value="{{ old('name') }}" class="form-control" placeholder="Naam">
                            </div>

                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" checked id="attends" name="attends" value="1">
                                <label class="form-check-label" for="attends">
                                    Ik ben erbij!
                                </label>
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
