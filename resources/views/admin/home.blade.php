@extends('admin.index')

@section('content')
    <div class="row">
        <!-- /.col -->
        <div class="col-md-4">
            <div class="info-box bg-aqua">
                <span class="info-box-icon"><i class="fa fa-file-text-o"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">Total de Arquivos</span>
                    <span class="info-box-number">{{ 1231 }}<small></small></span>
                                    <span class="progress-description">
                                      ---
                                    </span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <div class="col-md-4">
            <div class="info-box bg-aqua">
                <span class="info-box-icon"><i class="fa fa-cloud-upload"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">Espaço Utilizado</span>
                    <span class="info-box-number">{{ 123 }}<small>{{ 123 }}</small></span>
                                            <span class="progress-description">
                                              ---
                                            </span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <div class="col-md-4">
            <div class="info-box bg-aqua">
                <span class="info-box-icon"><i class="fa fa-user"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">Último acesso</span>
                    <span class="info-box-number"><small>{{ 123 }}</small></span>
                                            <span class="progress-description">
                                              ---
                                            </span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="box box-solid">
                <div class="box-header with-border text-yellow">
                    <i class="fa fa-exclamation"></i>

                    <h3 class="box-title">Avisos</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <p>Nenhum aviso no momento.</p>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
    </div>
@stop


@section('scripts')
    @parent

    <script>
        @if (Session::has('msg'))
            bootbox.dialog({
                title: 'Sucesso:',
                message: '<p class="text-green"><i class="fa fa-check"></i>&nbsp;&nbsp;{{ Session::get('msg') }}</p>',
                buttons: {
                    success: {
                        label: "OK",
                        className: "btn-default"
                    }
                }
            });
        @elseif(Session::has('error'))
        bootbox.dialog({
            title: 'Erro:',
            message: '<p class="text-red"><i class="fa fa-exclamation"></i>&nbsp;&nbsp;{{ Session::get('error') }}</p>',
            buttons: {
                success: {
                    label: "OK",
                    className: "btn-default"
                }
            }
        });
        @endif
    </script>
@stop