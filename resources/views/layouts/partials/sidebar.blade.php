<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <br>
        <!-- Sidebar user panel (optional) -->
        @if (! Auth::guest())
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{asset('/img/nurse.png')}}" class="img-circle" alt="User Image"  width="700px"/>
            </div>
            <div class="pull-left info">
                <br>
                <p>{{ Auth::user()->name }}</p>
                <!-- Status -->
               <!-- <a href="#"><i class="fa fa-circle text-success"></i> {{ trans('adminlte_lang::message.online') }}</a>-->
            </div>
        </div>
        @endif

        <!-- search form (Optional) -->
        <!--<form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="{{ trans('adminlte_lang::message.search') }}..."/>
              <span class="input-group-btn">
                <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
              </span>
            </div>
        </form>-->
        <!-- /.search form -->
        <br><br>
        <style>

        </style>

        <!-- Sidebar Menu -->
        <ul class="sidebar-menu">
            <!--<li class="header">{{ trans('adminlte_lang::message.header') }}</li>-->
            <!-- Optionally, you can add icons to the links -->
            <!--<li class="active"><a href="{{ url('home') }}"><i class='fa fa-link'></i> <span>{{ trans('adminlte_lang::message.home') }}</span></a></li>-->
            <li class="tree view active">
                <a href="{{ url('home') }}">
                    <i style="font-size:18px; color:#3c8dbc; " class='fa fa-home'></i> 
                    <span> Início</span>
                </a>
            </li>
            </li>
            @permission('administrador')
            <li class="treeview">
                <a href="#">
                    <i style="font-size:18px; color:#3c8dbc; " class='fa fa-users' data-toggle="dropdown"></i> 
                    <span> Funcionários</span> 
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu" style="display: none;">
                    <li style="margin-left: 20px;"><a href="{{ url('users') }}"> Usuários</a></li>
                    <li style="margin-left: 20px;"><a href="{{ url('roles') }}"></i> Papeis</a></li>
                    <li style="margin-left: 20px;"><a href="{{ url('especialidade') }}"></i> Especialidade</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i style="font-size:18px; color:#3c8dbc; " class='fa fa-h-square' data-toggle="dropdown"></i> 
                    <span> Hospital</span> 
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu" style="display: none;">
                    <li style="margin-left: 20px;"><a href="{{ url('clinica') }}"></i> Clínica</a></li> 
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i style="font-size:18px; color:#3c8dbc; " class='fa fa-heartbeat' data-toggle="dropdown"></i> 
                    <span> Pacientes</span> 
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu" style="display: none;">
                    <li style="margin-left: 20px;"><a href="{{ route('internacao.create') }}"> Cadastrar Paciente</a></li>
                    <li style="margin-left: 20px;"><a href="{{ route('internacao.index') }}"> Internações</a></li>
                    <li style="margin-left: 20px;"><a href="{{ route('prescricao.create') }}"></i>Criar Prescrição</a></li>  
                    <li style="margin-left: 20px;"><a href="{{ url('prescricao') }}"></i> Prescrições Realizadas</a></li>  
                    <li style="margin-left: 20px;"><a href="{{ route('cid10.index') }}"> Diagnóstico (CID 10)</a></li>
                     
                </ul>
            </li>          

            <li class="treeview">
                <a href="#">
                    <i style="font-size:18px; color:#3c8dbc; " class='fa  fa-medkit' data-toggle="dropdown"></i> 
                    <span> Medicamentos</span> 
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu" style="display: none;">
                    <li style="margin-left: 20px;"><a href="{{ url('medicamento') }}"></i> Medicamento</a></li>
                    <li style="margin-left: 20px;"><a href="{{ url('substanciaativa') }}"> Substância Ativa</a></li>
                    <li style="margin-left: 20px;"><a href="{{ url('formafarmaceutica') }}"></i> Forma Farmacêutica</a></li>
                    <li style="margin-left: 20px;"><a href="{{ url('interacaomedicamentosa') }}"></i> Interação Medicamentosa</a></li>
                    <li style="margin-left: 20px;"><a href="{{ route('relatorio.portaria') }}"></i>Relatório da Portaria 344</a></li>
                </ul>
            </li>       
            @endpermission

            @permission('medico')
            <li class="treeview">
                <a href="#">
                    <i style="font-size:18px; color:#3c8dbc; " class='fa fa-heartbeat' data-toggle="dropdown"></i> 
                    <span> Pacientes</span> 
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu" style="display: none;">
                    <li style="margin-left: 20px;"><a href="{{ route('internacao.create') }}"> Cadastrar</a></li>
                    <li style="margin-left: 20px;"><a href="{{ route('prescricao.create') }}"></i> Prescrição</a></li>  
                    <li style="margin-left: 20px;"><a href="{{ route('internacao.index') }}"> Internações</a></li>
                    <li style="margin-left: 20px;"><a href="{{ url('prescricao') }}"></i> Relatorio prescrição</a></li>  
                    
                    <li style="margin-left: 20px;"><a href="{{ route('cid10.index') }}"> Diagnóstico (CID 10)</a></li>
                    
                    <li style="margin-left: 20px;"><a href="{{ route('relatorio.portaria') }}"></i> Portaria 344</a></li>
                     
                </ul>
            </li>
            @endpermission

            @permission('farmaceutico')
            <li class="treeview">
                <a href="#">
                    <i style="font-size:18px; color:#3c8dbc; " class='fa  fa-medkit' data-toggle="dropdown"></i> 
                    <span> Medicamentos</span> 
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu" style="display: none;">
                    <li style="margin-left: 20px;"><a href="{{ url('medicamento') }}"></i> Medicamento</a></li>
                    <li style="margin-left: 20px;"><a href="{{ url('substanciaativa') }}"> Substância Ativa</a></li>
                    <li style="margin-left: 20px;"><a href="{{ url('formafarmaceutica') }}"></i> Forma Farmacêutica</a></li>
                    <li style="margin-left: 20px;"><a href="{{ url('interacaomedicamentosa') }}"></i> Interação Medicamentosa</a></li>
                </ul>
            </li>       
            @endpermission


            <?php /*
              <li><a href="#"><i class='fa fa-link'></i> <span>{{ trans('adminlte_lang::message.anotherlink') }}</span></a></li>
              <li class="treeview">
              <a href="#"><i class='fa fa-link'></i> <span>{{ trans('adminlte_lang::message.multilevel') }}</span> <i class="fa fa-angle-left pull-right"></i></a>
              <ul class="treeview-menu">
              <li><a href="#">{{ trans('adminlte_lang::message.linklevel2') }}</a></li>
              <li><a href="#">{{ trans('adminlte_lang::message.linklevel2') }}</a></li>
              </ul>
              </li>
             */ ?> 


            <!--  Teste-->

        </ul><!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>
