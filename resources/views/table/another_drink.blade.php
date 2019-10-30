@extends(Auth::user()->user_type == 'Admin' ? 'layouts.app' : 'layouts.waiter_app')
@section('title')
    Waiter
@endsection

@section('body')

<section class="vbox">
    <section class="scrollable padder">
        <ul class="breadcrumb no-border no-radius b-b b-light pull-in">
            <li><a href="index.html"><i class="fa fa-home"></i> Home</a></li>
        </ul>
        <div class="m-b-md">
            <h3 class="m-b-none">Another Drink</h3>
        </div>
        <section class="panel panel-default">
            <header class="panel-heading">
                <i class="fa fa-info-sign text-muted" data-toggle="tooltip" data-placement="bottom" data-title="ajax to load the data."></i>
            </header>

            <div class="panel-body" align="center">
                <div class="col-sm-12" >
                    <div class="form-group">
                       <a href="{{ route('table.show_drink') }}" class="btn btn-primary">Another<br/>Drink</a>
                    </div>                    
                    <div class="form-group">
                       <a href="{{ route('table.create') }}" class="btn btn-primary">Done</a>
                    </div>

                </div>
                    
            </div>

        </section>
    </section>
</section>

@endsection