function getDoctorsBySpecialty(specialtyId) {
    axios.get("{{ route('getDoctorsBySpecialty') }}", {
        params: {
            specialty_id: specialtyId
        }
    })
        .then(function (response) {
            $('#doctor_id').empty();
            response.data.doctors.forEach(function (doctor) {
                $('#doctor_id').append($('<option>', {
                    value: doctor.id,
                    text: doctor.nombre
                }));
            });
        })
        .catch(function (error) {
            console.error('Error al obtener los médicos:', error);
        });
}



