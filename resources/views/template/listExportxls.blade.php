<!doctype html>
<html lang="en">
<body>


    <table>
        <tr>
            <td style="text-align: center;background-color: #dddddd;text-transform: uppercase;" colspan="{!! count($export) !!}">
                <b style="text-align: center;">{!! $company->nombre_fantasia !!} - {!! ucfirst($section) !!} - {!! date('d/m/Y',time()) !!}</b>
            </td>
        </tr>
    </table>


    <table>
        <thead>
            <tr>
                @foreach($export as $ind => $val)
                    <th style="padding:10px !important;">{!! $ind !!}</th>
                @endforeach
            </tr>
        </thead>
        <tbody>
            @foreach($model as $datos)
                <tr>
                    @foreach($export as $att => $val)
                        <td style="padding:2px;">
                            @if(is_array($val))
                             <?php 
                                $d = $val[0];
                                $r = $val[1];
                             ?>
                                {!! $datos->$d ? $datos->$d->$r : '' !!}
                                
                            @else
                                @if($val == 'status')

                                    {!! config('status.items.' . $datos->$val) !!}

                              {{--   @elseif($val == 'id')

                                    
                                    'dadsad' --}}
                                @else

                                    {!! $datos->$val !!}

                                @endif
                            @endif
                        </td>
                    @endforeach
                </tr>
            @endforeach

        </tbody>

    </table>

</body>
</html>
