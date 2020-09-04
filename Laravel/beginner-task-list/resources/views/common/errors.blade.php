<!--Porcion de codigo a insertar en cada pagina para mostrar errores -->
@if(count($errors)>0)
    <!--Form error list-->
    <div class="alert alert-danger">
        <strong>Whoops! Algo salió mal!</strong>
        <br><br>
        @if ($errors->has('name'))
            <li>{{$errors->first('name')}}</li>
        @endif        
    </div>
@endif