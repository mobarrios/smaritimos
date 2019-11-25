<div class="modal  bs-example-modal-lg" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Agregar Item</h4>
            </div>



            <div class="modal-body row">


                <div class="col-xs-12 form-group">
                    @include('admin.items.itemsForm')

                </div>
                <div class="col-xs-4 form-group">
                    {!! Form::label('Precio de Lista') !!}
                    {!! Form::text('price_list', null, ['class'=>'form-control']) !!}
                </div>
                <div class="col-xs-4 form-group">
                    {!! Form::label('Precio de Contado') !!}
                    {!! Form::text('price_net', null, ['class'=>'form-control']) !!}
                </div>
                <div class="col-xs-4 form-group">
                    {!! Form::label('Dto. Máximo') !!}
                    {!! Form::text('max_discount', null, ['class'=>'form-control']) !!}
                </div>
                <div class="col-xs-12 form-group">
                    {!! Form::label('Observaciones') !!}
                    {!! Form::text('obs', null, ['class'=>'form-control']) !!}
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" id="aceptar" class="btn btn-default">Aceptar</button>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>
