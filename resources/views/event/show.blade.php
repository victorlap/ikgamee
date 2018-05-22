@extends('layouts.app')

@section('title')
    Ik ga mee naar {{ $event->name }}
@endsection

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
                                    <i class="fa fa-check text-success"></i>
                                @else
                                    <i class="fa fa-times text-danger"></i>
                                @endif

                                {{ $attendee->name }}

                                <br>
                            @empty
                                Nog niemand :(
                            @endforelse

                        <p class="text-muted pt-4 mb-0">
                            Share:
                            <a target="_blank" href="https://api.whatsapp.com/send?text={{ $shareText }}" class="text-muted">
                                <i class="fa fa-whatsapp"></i> Whatsapp
                            </a>
                            <a href="mailto:?subject=Ga%20jij%20mee%3F&body={{ $shareText }}" class="text-muted">
                                <i class="fa fa-envelope-o"></i> Email
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

                        <form action="{{ route('attendee.store')  }}" method="POST" class="mb-0">
                            @csrf
                            <input type="hidden" name="event_hash" value="{{ $event->hash }}">
                            <div class="form-group">
                                <label for="name" class="bmd-label-floating">Naam</label>
                                <input type="text" name="name" value="{{ old('name') }}" class="form-control" required>
                            </div>

                            <div class="form-check form-group">
                                <input class="form-check-input" type="checkbox" checked id="attends" name="attends" value="1">
                                <label class="form-check-label" for="attends">
                                    Ik ben erbij!
                                </label>
                            </div>

                            <input class="btn btn-primary btn-raised" type="submit" value="Opslaan">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
