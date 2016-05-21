$(document).ready(function () {
    formCliente();
}
);
function formCliente() {
    $('#paso2').hide();
    $('#nombreFormulario').hide();
    $('#back').hide();
    $('#next').click(function () {
        $('#paso1').hide();
        $('#nombreFormulario2').hide();
        $('#next').hide();
        $('#nombreFormulario').show('slow');
        $('#paso2').show('slow');
        $('#back').show('slow');

    }
    );


    $('#back').click(function () {
        $('#nombreFormulario2').show('slow');
        $('#paso1').show('slow');
        $('#next').show('slow');
        $('#paso2').hide();
        $('#nombreFormulario').hide();
        $('#back').hide();

    }
    );


}