<div class="col-xs-12 table-responsive">
    <table class="table table-bordered">
        <thead>
        <tr>
            <th>Modelo</th>
            <th>$ Lista</th>
            <th>$ Contado</th>
            <th>Dto. Max.</th>
            <th>Acciones</th>
        </tr>
        </thead>
        <tbody id="tbody">

        @if(session()->has($section.'Items'))
            @foreach(session($section.'Items') as $item)
                <tr>
                    <td>{!! \App\Entities\Admin\Models::find($item['models_id'])->name !!}</td>
                    <td>{!! $item['price_list'] !!}</td>
                    <td>{!! $item['price_net'] !!}</td>
                    <td>{!! $item['max_discount'] !!}</td>
                    <td>
                        <div class="btn-group actions">
                            <button class="btn btn-xs btn-success edit" data-id="{!! $item['models_id'] !!}"><i class="fa fa-edit"></i></button>
                            <button class="btn btn-xs btn-danger trash" data-id="{!! $item['models_id'] !!}"><i class="fa fa-trash-o"></i></button>
                        </div>
                    </td>
                </tr>
            @endforeach
        @endif
        @if(isset($models))
            @forelse($models->ModelsListsPricesItems as $model)
                <tr>
                    <td>{!! \App\Entities\Admin\Models::find($model['models_id'])->name !!}</td>
                    <td>{!! $model['price_list'] !!}</td>
                    <td>{!! $model['price_net'] !!}</td>
                    <td>{!! $model['max_discount'] !!}</td>
                    <td>
                        <div class="btn-group actions">
                            <button class="btn btn-xs btn-success edit" data-id="{!! $model['models_id'] !!}"><i class="fa fa-edit"></i></button>
                            <button class="btn btn-xs btn-danger trash" data-id="{!! $model['models_id'] !!}"><i class="fa fa-trash-o"></i></button>
                        </div>
                    </td>
                </tr>
            @empty

            @endforelse
        @endif
        </tbody>
    </table>
</div>