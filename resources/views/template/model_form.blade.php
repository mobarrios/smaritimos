@extends('template')
@section('sectionContent')
    <div class="row">
        <!-- Default box -->
        <div class="col-xs-12">
            <div class="box">

                <div class="box-header with-border">
                    <h3 class="box-title">@yield('form_title')</h3>
                </div>
                <div class="box-body">
                    @yield('form_inputs')
                </div>
                <div class="box-footer clearfix">
                    <button type="submit" class="btn btn-default">Guardar</button>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
    @yield('box')
@endsection

