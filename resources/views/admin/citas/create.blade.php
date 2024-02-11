@extends('layouts.app')

@section('titulo')
    Crear nueva cita
@endsection

@section('contenido')
    <a class="font-bold uppercase text-white bg-yellow-500 text-sm p-2 rounded-lg hover:bg-yellow-600"
        href="{{ route('admin.appointments') }}">
        Volver
    </a>
    <div class="flex justify-center p-4">

        <div class="w-4/12 p-4 bg-gray-200">
            <!-- Formulario para crear una nueva cita -->
            <h2 class="text-2xl font-bold mb-4">Crear Nueva Cita</h2>
            <form action="{{ route('admin.store.appointment') }}" method="post" novalidate>
                @csrf

                <div class="mb-4">
                    <label for="appointment_datetime" class="block text-sm font-semibold text-gray-600">Fecha y Hora de la Cita:</label>
                    <input 
                        type="datetime-local" 
                        id="appointment_datetime" 
                        name="appointment_datetime" 
                        required
                        min="{{ now()->format('Y-m-d\TH:i') }}"
                        class="w-full p-2 mt-1 border rounded-md focus:outline-none focus:ring focus:border-blue-300"
                        value="{{ old('appointment_datetime') }}"
                    >
                    @error('appointment_datetime')
                        <p class="bg-red-600 text-white uppercase p-3 rounded-lg text-center mt-2 text-sm">
                            {{ $message }}
                        </p>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="specialty" class="block text-sm font-semibold text-gray-600">Especialidad:</label>
                    <select id="specialty" name="specialty" required onchange="getDoctorsBySpecialty(this.value)"
                        class="w-full p-2 mt-1 border rounded-md focus:outline-none focus:ring focus:border-blue-300">
                        <option value="">Selecciona una especialidad</option>
                        @foreach ($specialties as $specialty)
                            <option value="{{ $specialty->id }}">{{ $specialty->name }}</option>
                        @endforeach
                    </select>
                    @error('specialty')
                        <p class="bg-red-600 text-white uppercase p-3 rounded-lg text-center mt-2 text-sm">
                            {{ $message }}
                        </p>
                    @enderror
                </div>
                

                <div class="mb-4">
                    <label for="doctor_id" class="block text-sm font-semibold text-gray-600">Médico Asociado:</label>
                    <select id="doctor_id" name="doctor_id" required
                        class="w-full p-2 mt-1 border rounded-md focus:outline-none focus:ring focus:border-blue-300">
                        <!-- Iterar sobre la lista de doctores para mostrar las opciones -->
                        @foreach ($doctors as $doctor)
                            <option value="{{ $doctor->id }}">{{ $doctor->nombre }}</option>
                        @endforeach
                    </select>
                    @error('doctor_id')
                        <p class="bg-red-600 text-white uppercase p-3 rounded-lg text-center mt-2 text-sm">
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="status" class="block text-sm font-semibold text-gray-600">Estado de la Cita:</label>
                    <select id="status" name="status" required
                        class="w-full p-2 mt-1 border rounded-md focus:outline-none focus:ring focus:border-blue-300">
                        <option value="available">Disponible</option>
                        <option value="reserved">Reservada</option>
                        <option value="completed">Completada</option>
                    </select>
                    @error('status')
                        <p class="bg-red-600 text-white uppercase p-3 rounded-lg text-center mt-2 text-sm">
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                <button type="submit"
                    class="w-full p-2 font-bold bg-blue-500 text-white rounded-md hover:bg-blue-600 focus:outline-none">
                    Crear Cita Médica
                </button>
            </form>
        </div>
    </div>
@endsection
<script>
    function getDoctorsBySpecialty(specialtyId) {
        $.ajax({
            url: "{{ route('getDoctorsBySpecialty') }}",
            type: 'GET',
            data: { specialty_id: specialtyId },
            success: function(response) {
                $('#doctor_id').empty();
                $.each(response.doctors, function(key, value) {
                    $('#doctor_id').append($('<option>', { value: value.id }).text(value.nombre));
                });
            }
        });
    }
</script>
