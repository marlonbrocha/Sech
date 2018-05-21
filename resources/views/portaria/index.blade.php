@extends('layouts.app')

<link href="{{ asset('js/jquery-ui-themes-1.12.0/themes/base/jquery-ui.css') }}" rel="stylesheet">
<link rel="stylesheet" href="{{ asset('plugins/datatables/dataTables.bootstrap.css') }}">

@section('main-content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        @section('contentheader_title')
        <div class="pull-left">
            <h2>Saída de Medicamentos da Portaria 344</h2>
        </div>
        @endsection
    </div>
</div>
<br>

<div class="row">
</div>
<br>
<div class="box box-primary" style="margin-left: 2%; margin-right: 2%; width: 96%;">
    <div class="box-body">
        <div class="row">
            <div class="box-body">
                <div class="table-responsive col-lg-12 col-md-12 col-sm-12">
                    {!! Form::open(array('route' => 'relatorio.buscar','method'=>'POST')) !!}
    <div class="row ls-clearfix">
            <div class="col-xs-3 col-sm-3 col-md-3">
                        <div class="form-group">
                            <label for="data">Data</label>
                            <div class="input-group input-group-sm">
                            <input type="date" name="date" class="form-control">
                            
                            <span class="input-group-btn">
                            <button type="submit" name="buscar" class="btn btn-primary" title="Buscar" class="btn btn-primary btn-flat buscar"><i class="fa fa-search"></i></button>
                        </span>
                    </div>
                </div>
             </div>
{!! Form::close() !!}
            </div>
        </div>
    </div>   
    <div class="box box-primary" style="margin-left: 2%; margin-right: 2%; width: 96%;">
    </div>

    @if(isset($_POST['buscar']))
                    <table  id="table2" class="table table-bordered table-hover dataTable">
                        <thead>
                            <tr>
                                <th class="text-center" width="4%">Nº</th>
                                <th class="text-center">Nome da substancia</th>
                                <th class="text-center">Clínica</th>
                                <th class="text-center">Quantidade</th>
                            </tr>
                        </thead>
                        <?php $i = 0; ?>
                        @foreach ($portarias  as $prescricao)
                        <tbody>
                            <tr>
                                <td>{{ ++$i }}</td>
                                <td>{{ $prescricao->nome_medicamento }}</td>
                                
                                <td>{{ $prescricao->nome_clinica }}</td>
                                <td>{{ $prescricao->qtdpedida}}</td>
                                <td width="2%">
                        </td>
                        </tr>
                        @endforeach
                        </tbody> 
                    </table>
                    @if($i >0 )
                    @permission('prescricao-edit') 
                    <div style="text-align: right;">
                        <a class="btn btn-default" title="Imprimir" href="{{ route('portaria.imprimir',$data) }}">
                                <i class="glyphicon glyphicon-print"> </i>
                            </a>
                    </div>
                    @endpermission
                    @endif
                    @endif
                </div>
            </div>
        </div>



        @endsection
        <script src = "{{ asset('js/jquery-3.1.0.js') }}"></script>
        <script src = "{{ asset('js/jquery.maskedinput.js') }}" type = "text/javascript" ></script>
        <script src = "{{ asset('js/jquery-ui-1.12.0/jquery-ui.js') }}" type = "text/javascript" ></script>
        <!-- DataTables -->
        <script src="{{ asset('plugins/datatables/jquery.dataTables.js') }}" type = "text/javascript"></script>
        <script src="{{ asset('plugins/datatables/dataTables.bootstrap.min.js') }}"></script>

        <script>
$(function ($) {
    $('#table').DataTable({
        "paging": true,
        "lengthChange": true,
        "searching": true,
        "ordering": true,
        "info": true,
        "autoWidth": true,
        "lengthMenu": [[10, 30, 50, -1], [10, 30, 50, "Todos"]],
        "columnDefs": [{
                "targets": 'no-sort',
                "orderable": false,
            }]
    });
    $('#table2').DataTable({
        "paging": true,
        "lengthChange": true,
        "searching": true,
        "ordering": true,
        "info": true,
        "autoWidth": true,
        "lengthMenu": [[10, 30, 50, -1], [10, 30, 50, "Todos"]],
        "columnDefs": [{
                "targets": 'no-sort',
                "orderable": false,
            }]
    });
});
        </script>
        <script>
            @if (Session::get('success'))
                    $(function () {
                        var msg = "{{Session::get('success')}}"
                        swal({
                            title: '',
                            text: msg,
                            confirmButtonColor: "#66BB6A",
                            type: "success",
                            html: true
                        });
                    });
                    @endif
        </script>

