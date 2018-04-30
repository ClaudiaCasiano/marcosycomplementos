
$(document).ready(function() {
    cargarServicios();


    $('#btn_create').click(function() {
        $("#btn_save").attr('btn_act',"C")
        $('#in_code').val('')
        $('#in_name').val('')
        $('#createModal').modal();
    });

    $("#btn_save").click(function() {
        if($("#btn_save").attr('btn_act') == 'C'){
            guardarServicio()
        }else{
            modificarServicio()
        }
    });

    $('#btn_add').click(function() {
        guardar_detalles();
    });

    $('#btn_del').click(function() {
        eliminarServicio();
    });
});


cargarServicios = function() {    
    $.post( base_url+"listado/get_servicios",{}, function( data ) {
        abc = data;
        if(data['success'] != 0){
            console.log('Error');
            return;
        }

        tabla = '';
        tabla+= '<div class="table-responsive">'
        tabla+=     '<table class="table table-striped table-bordered table-hover">'
        tabla+=         '<thead>'
        tabla+=             '<tr>'
        tabla+=                 '<th>Código</th>'
        tabla+=                 '<th>Nombre</th>'
        tabla+=                 '<th>Custodio</th>'
        tabla+=                 '<th>Recursos</th>'
        tabla+=                 '<th>Opciones</th>'
        tabla+=             '</tr>'
        tabla+=         '</thead>'
        tabla+=         '<tbody>'

        for (var i = data['data'].length - 1; i >= 0; i--) {
            data['data'][i]
            tabla+=             '<tr>'
            tabla+=                 '<td>'+data['data'][i].codigo+'</td>'
            tabla+=                 '<td>'+data['data'][i].nombre+'</td>'
            tabla+=                 '<td>'+data['data'][i].custodios+'</td>'
            tabla+=                 '<td>'+data['data'][i].recursos+'</td>'
            tabla+=                 '<td><select class="opcionA form-control" serid = "'+data['data'][i].id+'"><option value = "0" > </option><option value = "M" >Modificar</option><option value = "A" >Agregar Detalle</option><option value = "D">Eliminar</option></select></td>'
            tabla+=             '</tr>'
        }

        tabla+=         '</tbody>'
        tabla+=     '</table>'
        tabla+= '</div>'
        $('#tabla').html(tabla)
    },'json').done(function() {
        cargarFunciones();
    });
}

cargarFunciones = function() {
    $('.opcionA').on('change', function (e) {
        //var valueSelected = this.va;

        switch($(this).find('option:selected').val()) {
            case "M":
                $("#btn_save").attr('btn_act',"M");
                $("#btn_save").attr('code',$(this).attr('serid'));
                $('#in_code').val('')
                $('#in_name').val('')
                $('#createModal').modal();
                break;
            case "A":
                $("#btn_add").attr('code',$(this).attr('serid'));
                cargarCustodios($(this).attr('serid'));
                break;
            case "D":
            $('#btn_del').attr('code',$(this).attr('serid'));
            $('#delModal').modal()
                break;

        }

    $(this).val("0")
    });
}


guardarServicio = function() {
    if(datos_modal_ok()){
        envio = {
            "codigo": $('#in_code').val()
            , "nombre": $('#in_name').val()
        }
    }


    $.post( base_url+"listado/guardar_servicio",envio,  function( data ) {
        mydat = data;
        switch(data['success'][0].CODIGO) {
            case "-1":
                console.log("Error");
                break;
            case "0":
                console.log("Guardado con exito");
                $('#createModal').modal('hide');
                cargarServicios();
                break;
            case "1":
                console.log("Codigo Repetido");
                break;

            case "2":
                console.log("Codigo Repetido deshabilitado");
                break;
        }

    } , 'json');

}


datos_modal_ok = function() {
    return true;
}


cargarCustodios = function(id) {
    envio = {'code':id};
    console.log('aca')
    $.post( base_url+"listado/buscar_custodio",envio, function( data ) {
        abc = data;
        if(data['success'] != 0){
            console.log('Error');
            return;
        }

        tabla = '';
        tabla+=     '<table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-c">'
        tabla+=         '<thead>'
        tabla+=             '<tr>'
        tabla+=                 '<th>Nombre</th>'
        tabla+=                 '<th>Apellido</th>'
        tabla+=                 '<th width="10%">Seleccionar</th>'
        tabla+=             '</tr>'
        tabla+=         '</thead>'
        tabla+=         '<tbody>'
//"'+(data['data'][i].estado == "1") ?  ' checked ':''+'"
        for (var i = data['data'].length - 1; i >= 0; i--) {
            if (data['data'][i].estado == '1'){
                chequeado = 'checked';
            }else{
                chequeado = '';
            }

            tabla+=             '<tr>'
            tabla+=                 '<td>'+data['data'][i].nombre+'</td>'
            tabla+=                 '<td>'+data['data'][i].apellido+'</td>'
            tabla+=                 '<td><div class="checkbox"><label><input type="checkbox"  '+chequeado+' value="'+data['data'][i].codigo+'"></label></div></td>'
            tabla+=             '</tr>'
        }


        tabla+=         '</tbody>'
        tabla+=     '</table>'
        $('#formcusto').html(tabla);

       t1 =  $('#dataTables-c').DataTable({
            responsive: true
            , "pageLength": 5
            ,"bFilter": false
            ,"bLengthChange": false
            ,stateSave: true
        });

    },'json')
    .done(function() {
        console.log('aca3')
        cargarRecursos(id);
    })
    ;
}


cargarRecursos = function(id) {
    envio = {'code':id};
    $.post( base_url+"listado/buscar_recurso",envio, function( data ) {
        abcd = data;
        if(data['success'] != 0){
            console.log('Error');
            return;
        }

        tabla = '';
        tabla+=     '<table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-r">'
        tabla+=         '<thead>'
        tabla+=             '<tr>'
        tabla+=                 '<th>Código</th>'
        tabla+=                 '<th>Nombre</th>'
        tabla+=                 '<th>Tipo</th>'
        tabla+=                 '<th width="10%">Seleccionar</th>'
        tabla+=             '</tr>'
        tabla+=         '</thead>'
        tabla+=         '<tbody>'

        for (var i = data['data'].length - 1; i >= 0; i--) {
            if (data['data'][i].estado == '1'){
                chequeado = 'checked';
            }else{
                chequeado = '';
            }
            tabla+=             '<tr>'
            tabla+=                 '<td>'+data['data'][i].codigo_recurso+'</td>'
            tabla+=                 '<td>'+data['data'][i].nombre+'</td>'
            tabla+=                 '<td>'+data['data'][i].tipo+'</td>'
            tabla+=                 '<td><div class="checkbox"><label><input type="checkbox"  '+chequeado+' value="'+data['data'][i].codigo+'"></label></div></td>'
            tabla+=             '</tr>'
        }

        tabla+=         '</tbody>'
        tabla+=     '</table>'
        $('#formrecur').html(tabla)
        t2 = $('#dataTables-r').DataTable({
            responsive: true
            , "pageLength": 5
            ,"bLengthChange": false
            ,"bFilter": false
            , stateSave: true
        }); 
    },'json').done(function() {
        $('#addModal').modal();
    });
}


guardar_detalles = function() {
    informacion = [];


    t1.rows().iterator( 'row', function ( context, index ) {
        checkbox = $( this.row( index ).node() ).find("td").eq(2).find('div').find('label');

        holi = [];
        holi[0] = $('#btn_add').attr('code');
        holi[1] = $(checkbox.find('input')).attr('value');
        holi[2] = 1;
        holi[3] = $(checkbox.find('input')).is(':checked')?1:0;
        informacion.push(holi)

    } );


    t2.rows().iterator( 'row', function ( context, index ) {
        checkbox = $( this.row( index ).node() ).find("td").eq(3).find('div').find('label');

        holi = [];
        holi[0] = $('#btn_add').attr('code');
        holi[1] = $(checkbox.find('input')).attr('value');
        holi[2] = 2;
        holi[3] = ($(checkbox.find('input')).is(':checked')?1:0);
        informacion.push(holi)
    } );
    

    envio = {'info':informacion}
    console.log(envio);
    $.post( base_url+"listado/guardar_detalles",envio,  function( data ) {
        mydat = data;
        switch(data.success) {
            case "-1":
                console.log("Error");
                break;
            case 0:
                console.log("Guardado con exito");
                $('#addModal').modal('hide');
                cargarServicios();
                break;
            case "1":
                console.log("Codigo Repetido");
                break;

            case "2":
                console.log("Codigo Repetido deshabilitado");
                break;
        }

    } , 'json').done(function() {});
}


modificarServicio = function() {
    if(datos_modal_ok()){
        envio = {
            "id":$('#btn_save').attr('code')
            ,"codigo": $('#in_code').val()
            , "nombre": $('#in_name').val()
        }
    }


    $.post( base_url+"listado/modificar_servicio",envio,  function( data ) {
        mydat = data;
        switch(data['success']) {
            case "-1":
                console.log("Error");
                break;
            case 0:
                console.log("Guardado con exito");
                $('#createModal').modal('hide');
                cargarServicios();
                break;
            case "1":
                console.log("Codigo Repetido");
                break;

            case "2":
                console.log("Codigo Repetido deshabilitado");
                break;
        }

    } , 'json');
}


eliminarServicio = function() {
    if(datos_modal_ok()){
        envio = {
            "id":$('#btn_del').attr('code')
        }
    }


    $.post( base_url+"listado/eliminar_servicio",envio,  function( data ) {
        mydat = data;
        switch(data['success']) {
            case "-1":
                console.log("Error");
                break;
            case 0:
                console.log("Guardado con exito");
                $('#delModal').modal('hide');
                cargarServicios();
                break;
            case "1":
                console.log("Codigo Repetido");
                break;

            case "2":
                console.log("Codigo Repetido deshabilitado");
                break;
        }

    } , 'json');
}


showhideMessage = function(element) {
        
        $(element).hide(1000);
    
}