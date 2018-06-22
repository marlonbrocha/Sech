@extends('layouts.app')
<link href="{{ asset('js/jquery-ui-themes-1.12.0/themes/base/jquery-ui.css') }}" rel="stylesheet">
<link rel="stylesheet" href="{{ asset('plugins/datatables/dataTables.bootstrap.css') }}">
@section('main-content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        @section('contentheader_title')
        <div class="pull-left">
            <h2>Interações Medicamentosas</h2>
        </div>
        @endsection
        <div class="pull-right">
            @permission('interacaomedicamentosa-create')
            <a class="btn btn-success" href="{{ route('interacaomedicamentosa.create') }}"> Cadastrar interação medicamnetosa</a>
            @endpermission
        </div>
        <br><br>
    </div>
</div>
@if ($message = Session::get('success'))
<div class="alert alert-success">
    <p>{{ $message }}</p>
</div>
@endif

<br><br>
<div class="box box-primary " style="margin-left: 2%; margin-right: 2%; width: 96%;">
    <div class="box-body">
        <div class="table-responsive col-lg-12 col-md-12 col-sm-12">
<table id="table" class="table table-bordered table-hover dataTable" role="grid">
    <thead>
        <tr>
            <th>No</th>
            <th>Substâncias</th>
            <th>Gravidade</th>
            <th>Consequência</th>
            <th width="280px">Ação</th>
        </tr>
    </thead>
    <tbody>
    @foreach ($interacaomedicamentosas as $key => $interacaomedicamentosa)
    <tr>
        <td>{{ ++$i }}</td>
        <td>{{ $interacaomedicamentosa->substanciaativa1->nome}} e {{ $interacaomedicamentosa->substanciaativa2->nome }} </td>        
        <td>{{ $interacaomedicamentosa->gravidade}}</td>
        <td>{{ $interacaomedicamentosa->consequencia }}</td>
        <td>
            <a class="btn btn-info" href="{{ route('interacaomedicamentosa.show',$interacaomedicamentosa->id) }}">Visualizar</a>
            @permission('interacaomedicamentosa-edit')
            <a class="btn btn-primary" href="{{ route('interacaomedicamentosa.edit',$interacaomedicamentosa->id) }}">Editar</a>
            @endpermission
            @permission('interacaomedicamentosa-delete')
            {!! Form::open(['method' => 'DELETE','route' => ['interacaomedicamentosa.destroy', $interacaomedicamentosa->id],'style'=>'display:inline']) !!}
            {!! Form::submit('Excluir', ['class' => 'btn btn-danger']) !!}
            {!! Form::close() !!}
            @endpermission
        </td>
    </tr>
    @endforeach
    </tbody>
</table>
</div>
</div>
</div>
{!! $interacaomedicamentosas->render() !!}
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