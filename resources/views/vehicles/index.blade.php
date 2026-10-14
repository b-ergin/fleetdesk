<h1>{{ $title }}</h1>
<a href="/vehicles/create">Add a vehicle</a>

@foreach ($vehicles as $vehicle)
    <p>
        <a href="/vehicles/{{ $vehicle->id }}">{{ $vehicle->name }}</a>
        - {{ $vehicle->registration_number }}
    </p>
@endforeach