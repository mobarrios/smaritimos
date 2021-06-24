<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            {{config('models.'.$section.'.sectionName')}}
        </h1>

    </section>
    <!-- Main content -->
    <section class="content">
        <ol class="breadcrumb " style="background-color: white">
            <li>
                <a href="{{route('home')}}"><span class="fa fa-home"></span></a>
            </li>
            <li>
                <a href="{{route(config('models.'.$section.'.indexRoute'))}}">{{config('models.'.$section.'.sectionName')}}</a>
            </li>
            <li class="active">{{$activeBread or ''}}</li>
        </ol>
        @include('template.messages')


        @yield('sectionContent')

        <!-- /.box -->
    </section>
    <!-- /.content -->
</div>
