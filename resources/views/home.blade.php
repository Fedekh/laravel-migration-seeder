@extends('layouts.app')

@section('main')

<!-- Nel tuo file di vista 'home.blade.php' -->
<div class="container ">
    <h1 class="text-center">Elenco treni in partenza oggi</h1>
    <table class="table table-striped custom-table">
        <thead>
            <tr class="">
                <th>Company Name</th>
                <th>Station Start</th>
                <th>Station End</th>
                <th>Time Start</th>
                <th>Time End</th>
                <th>Train Code</th>
                <th>Number of Carriages</th>
                <th>In Time</th>
                <th>Delayed</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($trains as $train)
            <tr>
                <td>{{ $train->company_name }}</td>
                <td>{{ $train->station_start }}</td>
                <td>{{ $train->station_end }}</td>
                <td>{{ $train->time_start }}</td>
                <td>{{ $train->time_end }}</td>
                <td>{{ $train->train_code }}</td>
                <td>{{ $train->number_carriages }}</td>
                <td>{{ $train->in_time ? 'Yes' : 'No' }}</td>
                <td>{{ $train->delayed ? 'Yes' : 'No' }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>


@endsection
