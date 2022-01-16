@extends('layouts.app')

@section('content')
    <link href="{{ asset('css/eventIndex.css') }}" rel="stylesheet">
    <div class="container">
        <div class="row">
            <div class="col-sm col-md-2">
                <div>
                    <a class="btn btn-success" href="{{ route('events.create') }}"> Create New Event</a>
                </div>
            </div>
            <div class="col-sm col-md-10">
                <h1>Events</h1>
            </div>

        </div>
        <div class="row">
            @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
            @endif
        </div>

        <div class="row">
            @foreach ($data as $key => $value)
                <div class="col-md-6 col-lg-4 karta">
                    <div class="card" >
                        <div class="card-body">
                            <h3 class="card-title">{{ $value->name }}</h3>
                            <table class="table">
                                <tbody>
                                <tr>
                                    <td class="nazovTabulky">Place</td>
                                    <td>{{ $value->place }}</td>
                                </tr>
                                <tr>
                                    <td class="nazovTabulky">Date</td>
                                    <td>{!! date('d.m.Y', strtotime($value->date)) !!}</td>
                                </tr>


                                </tbody>
                            </table>
                            <h5>Description</h5>
                            <p>{{ \Str::limit($value->description, 100) }}</p>
                            <form action="{{ route('events.destroy',$value->id) }}" method="POST">
                                <a class="btn btn-info" href="{{ route('events.show',$value->id) }}">Show</a>
                                <a class="btn btn-primary" href="{{ route('events.edit',$value->id) }}">Edit</a>
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                            <script>

                            </script>

                        </div>
                    </div>
                </div>
            @endforeach
        </div>








    </div>
@endsection
