<header class="main-header">
    <!-- Logo -->
    <a href="" class="logo">


        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini">
            <span class="fa-stack fa-xs">
                @if(auth()->user()->branchesActive->company->images->count() > 0)
                    <img src="{!! auth()->user()->branchesActive->company->images->first()->path !!}" alt="logo" class="img-responsive">
                @endif
            </span>
        </span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg">
            <span class="fa-stack fa-lmg">
                @if(auth()->user()->branchesActive->company->images->count() > 0)
                    <img src="{!! auth()->user()->branchesActive->company->images->first()->path !!}" alt="logo" class="img-responsive">
                @else
                    <i class="fa  fa-paperclip "></i>
                @endif
            </span>
                <span>{!! auth()->user()->branchesActive->company->nombre_fantasia !!}</span>
        </span>

    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </a>

        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                <!-- User Account: style can be found in dropdown.less -->
                <li class="dropdown user user-menu">
                    <a class="dropdown-toggle" href="{!! route('admin.profiles.index') !!}">
                        <span class="fa fa-user"></span>
                        <span class="hidden-xs">{{\Illuminate\Support\Facades\Auth::user()->email}}</span>
                    </a>
                </li>
                <li class="dropdown">
                    <a class="dropdown-toggle text-black" data-toggle="dropdown" href="#" aria-expanded="false">
                        <span class="fa fa-building"></span>
                        {{\Illuminate\Support\Facades\Auth::user()->BranchesActive->name}}
                       <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu">
                        @foreach(\Illuminate\Support\Facades\Auth::user()->Brancheables as $branch)
                            <li role="presentation"><a  class="text-sm" role="menuitem" tabindex="-1" href="{{route('configs.users.changeBranch',$branch->Branches->id)}}"> {{$branch->Branches->name}} </a></li>
                        @endforeach
                    </ul>
                </li>



                <!-- Control Sidebar Toggle Button -->
                <li>
                    <a href="{{route('logout')}}"><i class="fa fa-sign-out"></i></a>
                </li>
            </ul>
        </div>
    </nav>
</header>