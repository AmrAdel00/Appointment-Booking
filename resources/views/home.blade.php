@extends('layouts.app')

@section('content')
    <table class="table my-3">
        <thead>
        <tr>
            <th scope="col">#</th>
            @foreach($service->appointments[0]->days as $day)
                <th scope="col">{{ $day['date'] }}</th>
            @endforeach
        </tr>
        </thead>
        <tbody>
            @foreach($service->appointments as $appointment)
                <tr>
                    <th scope="row">{{ $appointment->time }}</th>
                    @foreach($appointment->days as $day)
                        <td style="@if($day['available'] == true) color:green @else color:red @endif">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-circle-fill" viewBox="0 0 16 16">
                                <circle cx="8" cy="8" r="8"/>
                            </svg>
                        </td>
                    @endforeach
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
