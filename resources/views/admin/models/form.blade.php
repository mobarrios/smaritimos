@extends('template.model_form')

@section('form_title')
    Nuevo Modelo
@endsection

@section('form_inputs')
    @if(isset($models))
        {!! Form::model($models,['route'=> [config('models.'.$section.'.updateRoute'), $models->id] , 'files' =>'true']) !!}
    @else
        {!! Form::open(['route'=> config('models.'.$section.'.storeRoute') , 'files' =>'true']) !!}
    @endif
    <div class="col-xs-6 form-group">
        {!! Form::label('Nombre Modelo') !!}
        {!! Form::text('name', null, ['class'=>'form-control']) !!}
    </div>

    <div class="col-xs-6 form-group">
        {!! Form::label('Marca') !!}
        {!! Form::select('brands_id', $brands , null ,['class'=>'select2 form-control ']) !!}
    </div>
    {{--<div class="col-xs-3 ">--}}
        {{--{!! Form::label('Tipo') !!}--}}
        {{--{!! Form::select('types_id', $types , null ,['class'=>'select2 form-control' ]) !!}--}}
    {{--</div>--}}
    <div class="col-xs-3 ">
        {!! Form::label('Categorias') !!}
        {!! Form::select('categories_id[]', $categories , null ,['class'=>'selectMulti form-control' ,'multiple'=>'']) !!}
    </div>

    <div class="col-xs-6 form-group">
        {!! Form::label('Proveedores') !!}

        {{--{!! dd($models->providers->lists('id')) !!}--}}

        @if(isset($models))
            {!! Form::select('providers_id[]', $providers , $models->providers_id,['class'=>'select2 form-control','multiple'=>'']) !!}
        @else
            {!! Form::select('providers_id[]', $providers , null ,['class'=>'select2 form-control','multiple'=>'']) !!}
        @endif
    </div>

    <div class="col-xs-3 form-group">
        {!! Form::label('Estado') !!}
        {!! Form::select('status', $status ,null, ['class'=>'select2 form-control']) !!}
    </div>



    <div class="col-xs-3 form-group">
        {!! Form::label('Stock Min') !!}
        {!! Form::text('min_stock', null, ['class'=>'form-control']) !!}
    </div>

    <div class="col-xs-3 form-group">
        {!! Form::label('Descuenta Stock ') !!}
        {!! Form::select('stock_discount',[ 1 => 'Si' , 0 => 'No' ],null, ['class'=>'form-control']) !!}
    </div>


    <div class="col-xs-3 form-group">
        {!! Form::label('Imagen') !!}
        {!! Form::file('image') !!}
    </div>

    <div class="col-xs-12">
        <div class="col-xs-12 col-md-6">
            <h4>Stock Actual</h4>
            <table class="table">
                @if(isset($models))
                    @forelse($models->StockByBranches as $branch)
                        <tr>
                            <td> {{$branch->first()->Branches->name}}</td>
                            <td><span class="label label-primary">{{$branch->count()}}</span></td>
                        </tr>
                    @empty
                            <p class="text-muted">Sin stock por el momento.</p>
                    @endforelse
                @endif
            </table>
        </div>


        @if(isset($models))
            <div class="col-xs-6 " id="adicionales">
                <h4>Adicionales</h4>
                <div class="input-group">
                    <div class="input-group-btn" style="font-size: 12px !important;">
                        {!! Form::select('additionals_id',$additionals,null,['class' => 'btn btn-default select2']) !!}
                    </div><!-- /btn-group -->
                    {!! Form::number('amount',null,['class' => 'form-control','placeholder' => '$']) !!}
                    {!! Form::hidden('entity',$section) !!}
                    {!! Form::hidden('id',$models->id) !!}
                    {!! Form::hidden('_token',csrf_token()) !!}
                    <div class="input-group-btn">
                        <button type="button" class="btn btn-default saveAdicionales">
                            <i class="fa fa-floppy-o"></i>
                        </button>
                    </div>

                </div><!-- /input-group -->
                <br>


                <table class="table adicionales">

                        @foreach($models->additionables as $additionals)
                            <tr>
                                <td class="text-center">{{$additionals->Additionals->name or ''}}</td>
                                <td class="text-center"> $ {{$additionals->amount or ''}}</td>
                                <td>
                                    <div class="btn-group pull-right">
                                        <a href="{!! url('admin/removeAdditionals',$additionals->id) !!}" class="btn btn-xs btn-danger deleteAdicionales" data-id="{!! $additionals->id !!}"><i class="fa fa-trash"></i></a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                </table>
            </div>
        @endif
    </div>

@endsection

@section('js')
    <script>
        var contenedor = $("#adicionales")
        var save = $(".saveAdicionales")
        var remove = $(".adicionales a[btn-danger]")


        var select = contenedor.find('select[name=additionals_id]')
        var amount = contenedor.find('input[name=amount]')
        var entity = contenedor.find('input[name=entity]')
        var id = contenedor.find('input[name=id]')

        save.on('click',function(ev){
            ev.preventDefault()

            if(select.val() == "" && mount.val() == "")
                return false
            else{
                var data = {
                    additionals_id : select.val(),
                    amount : amount.val(),
                    entity: entity.val(),
                    _token: "{!! csrf_token() !!}",
                    id: id.val()
                }


                $.ajax({
                    url: 'admin/addAdditionals',
                    data: data,
                    method: 'POST',
                    success: function(response){
                        console.log(response);
                        $(".adicionales").append($('<tr><td class="text-center">'+response.name+'</td><td class="text-center"> $ '+response.amount+'</td><td><div class="btn-group pull-right"><a href="admin/removeAdditionals/'+response.additionable_id+'" class="btn btn-xs btn-danger deleteAdicionales" data-id="'+response.additionable_id+'"><i class="fa fa-trash"></i></a></div></td></tr>'))
                    },
                    error: function (error) {
                        console.log("Error: "+error)
                    }
                })

            }
        })



        contenedor.on('click','.deleteAdicionales',function(ev){
            ev.preventDefault()

            $(this).attr('disabled',true)
            $(this).prop('disabled',true)

            var contenedor = $(this).parent().parent().parent()

            var data = {
                additionals_id : $(this).attr('data-id'),
                entity: entity.val(),
                _token: "{!! csrf_token() !!}",

                id: id.val()
            }



            $.ajax({
                url: 'admin/removeAdditionals',
                data: data,
                method: 'POST',
                success: function(response){
                    $(contenedor).remove()

                    $(this).attr('disabled',false)
                    $(this).prop('disabled',false)
                },
                error: function (error) {
                    console.log("Error: "+error)
                    $(this).attr('disabled',false)
                    $(this).prop('disabled',false)
                }
            })

        })






    </script>


@endsection
