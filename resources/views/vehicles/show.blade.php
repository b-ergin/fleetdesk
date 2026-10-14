<h1>{{ $vehicle->name }}</h1>
<p>Registration: {{ $vehicle->registration_number }}</p>
<a href="/vehicles/{{ $vehicle->id }}/edit">Edit vehicle</a>
<a href="/vehicles">Back to Vehicles</a>
<form method="POST" action="/vehicles/{{ $vehicle->id }}">
    @csrf
    @method('DELETE')
    <button type="submit">Delete vehicle</button>
</form>
