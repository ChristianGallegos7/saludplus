

// Desaparecer la alerta de éxito después de 3 segundos
window.onload = function () {
    setTimeout(function () {
        document.getElementById('success-alert').style.display = 'none';
    }, 3000);
};

