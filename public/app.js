// document.getElementById('specialty').addEventListener('change', function () {
//     var specialtyId = this.value;
//     axios.get('/get-doctors-by-specialty', {
//         params: {
//             specialty_id: specialtyId
//         }
//     })
//         .then(function (response) {
//             // Limpiar la lista de opciones existentes
//             var doctorSelect = document.getElementById('doctor_id');
//             doctorSelect.innerHTML = '';

//             // Agregar nuevas opciones basadas en la respuesta del servidor
//             var doctors = response.data.doctors;
//             doctors.forEach(function (doctor) {
//                 var option = document.createElement('option');
//                 option.value = doctor.id;
//                 option.text = doctor.nombre;
//                 doctorSelect.appendChild(option);
//             });
//         })
//         .catch(function (error) {
//             console.error('Error al obtener los médicos:', error);
//         });
// });


// Esperar 3 segundos y luego ocultar la alerta de éxito
setTimeout(function () {
    document.getElementById('successAlert').style.display = 'none';
}, 3000); // 3000 milisegundos = 3 segundos
