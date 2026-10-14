<h1>Edit Vehicle</h1>

<form method="POST" action="/vehicles/{{ $vehicle->id }}">
    @csrf
    @method('PUT')

    <label for="vehicle-name">Vehicle Name</label>
    <input type="text" id="vehicle-name" name="name"
        value="{{ old('name', $vehicle->name) }}">
    @error('name')
        <p>{{ $message }}</p>        
    @enderror

    <label for="vehicle-registration">Registration Number</label>
    <input type="text" id="vehicle-registration" name="registration_number"
        value="{{ old('registration_number', $vehicle->registration_number) }}">
    @error('registration_number')
        <p>{{ $message }}</p>        
    @enderror

    <button type="submit">Save Changes</button>
</form>