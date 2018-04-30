<?php
?>
        
 <div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Servicios</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>

<div class="row">
    <div class="col-lg-12">
        <button type="button" class="btn btn-primary" id="btn_create">Crear Servicio</button>
    </div>
</div>
<br>
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                Servicios Disponibles
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <div id= "tabla">
                </div>
                <!-- /.table-responsive -->
            </div>
            <!-- /.panel-body -->
        </div>
        <!-- /.panel -->
    </div>
</div>

<div class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Servicios</h4>
            </div>
            <div class="modal-body">
                
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Agregar Servicio
                            </div>
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-lg-12">

                                         <form role="form">
                                            <div class="form-group">
                                                <label>Código de servicio</label>
                                                <input class="form-control" id="in_code">
                                            </div>
                                            <div class="form-group">
                                                <label>Nombre Servicio</label>
                                                <input class="form-control" id="in_name">
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger btn-circle" data-dismiss="modal"><i class="fa fa-times"></i></button>
                <button type="button" class="btn btn-info btn-circle" id="btn_save" btn_act ="C"><i class="fa fa-check"></i></button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>



<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Servicios</h4>
            </div>
            <div class="modal-body">
                
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Asignar Custodios
                            </div>
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-lg-12">
                                         <div id="formcusto">
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>   


                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Asignar Recursos
                            </div>
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-lg-12">
                                         <form role="form" id="formrecur">
                                           
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger btn-circle" data-dismiss="modal"><i class="fa fa-times"></i></button>
                <button type="button" class="btn btn-info btn-circle" id="btn_add" btn_act ="A"><i class="fa fa-check"></i></button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>


<div class="modal fade" id="delModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Servicios</h4>
            </div>
            <div class="modal-body">
                <h2>¿Desea Eliminar Este servicio?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger btn-circle" data-dismiss="modal"><i class="fa fa-times"></i></button>
                <button type="button" class="btn btn-info btn-circle" id="btn_del" ><i class="fa fa-check"></i></button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>