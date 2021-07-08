<footer class="main-footer">
    <div class="pull-right hidden-xs">
        DB: <b>{{\Illuminate\Support\Facades\Auth::user()->db}}</b> |
        Branch: <b>{{shell_exec('git branch | grep \*')}}</b> |
        Version: <b>{{config('app.version')}}</b>
    </div>
    <strong>Coders.com.ar</strong> All rights
    reserved.
</footer>
