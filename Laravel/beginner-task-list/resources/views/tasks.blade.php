@extends('app')

@section('content')
    <!--Insertando contenido en la master -->
    <div class="row mt-5">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-header">
                    Nueva Tarea
                </div>
                <div class="card-body">
                    <!--Desplegando errores en validacion -->
                    @include('common.errors')
                    <!--Form nuevas tareas -->
                    <form action="/task" method="POST" class="form form-horizontal">
                        {{csrf_field()}}                        
                        <div class="form-group">
                            <label for="task" class="col-sm-3"><b>Tarea</b></label>
                            <div>
                                <input type="text" name="name" id="task-name" class="form-control" placeholder="">
                            </div>                            
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-6">
                                <button type="submit" class="btn btn-default border">
                                    <i class="fa fa-plus mr-1"></i> Add Task  
                                </button>
                            </div>
                        </div>
                    </form>
                </div>                
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="col-lg-6">
            <div class="card">
                <div class="card-header">
                    Tareas Actuales
                </div>
                <div class="card-body">
                    <!--Lista de tareas -->
                    @if (count($tasks) > 0)
                        <table class="table table-striped task-table">
                            <thead>
                                <tr>
                                    <th>Tareas</th>
                                    <th>&nbsp;</th>                                
                                </tr>
                            </thead>
                            <tbody>                            
                                @foreach ($tasks as $task)
                                    <tr>
                                        <td>
                                            <div>{{$task->name}}</div>
                                        </td>
                                        <td>
                                            <form action="/task/{{$task->id}}" method="POST">
                                                {{ csrf_field() }}
                                                <!--Generando un input oculto para poder realizar la peticion delete-->
                                                {{ method_field('DELETE')}}
                                                <button class="btn btn-danger"><i class="fa fa-trash mr-1" aria-hidden="true"></i> Eliminar</button>
                                            </form>    
                                        </td>                                    
                                    </tr>
                                @endforeach                                                    
                            </tbody>
                        </table>
                    @endif
                </div>                
            </div>
        </div>
    </div>
    
    
@endsection