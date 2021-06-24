<table>
    <tr>
        <td>Cod.</td>
        <td>Marca</td>
        <td>Modelo</td>
        <td>Precio Contado</td>
        <td>Precio Lista</td>
    </tr>

    @foreach($providers->Models as $model)
       <tr>
           <td>{{$model->id}}</td>
           <td>{{$model->Brands->name}}</td>
           <td>{{$model->name}}</td>
           <td></td>
           <td></td>
       </tr>
    @endforeach

</table>