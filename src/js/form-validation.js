$(document).ready(function(){
    $('#cpf').mask('000.000.000-00');

    document.getElementById('corretorForm').addEventListener('submit', function(event) {
        var cpf = document.getElementById('cpf').value.replace(/\D/g, '');
        var creci = document.getElementById('creci').value;
        var name = document.getElementById('name').value;
        var isValid = true;

        if (cpf.length !== 11) {
            document.getElementById('cpf').classList.add('is-invalid');
            isValid = false;
        } else {
            document.getElementById('cpf').classList.remove('is-invalid');
        }

        if (creci.length < 2) {
            document.getElementById('creci').classList.add('is-invalid');
            isValid = false;
        } else {
            document.getElementById('creci').classList.remove('is-invalid');
        }

        if (name.length < 2) {
            document.getElementById('name').classList.add('is-invalid');
            isValid = false;
        } else {
            document.getElementById('name').classList.remove('is-invalid');
        }

        if (!isValid) {
            event.preventDefault();
        }
    });
    

    setTimeout(function() {
        $('#statusMessage').fadeOut('slow');
    }, 1000);

});
