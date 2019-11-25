@extends('template')
@section('sectionContent')

    <div class="box">

        <div class="box-body">
            <table class="table">
    @foreach($cheques as $cheque)
        <tr>
            <td>{{$cheque->n_cheque}}</td>
            <td>{{$cheque->payment_date}}</td>
            <td>$ {{ number_format( $cheque->amount,2)}}</td>
        </tr>
    @endforeach
            </table>
        </div>

    </div>
@endsection

