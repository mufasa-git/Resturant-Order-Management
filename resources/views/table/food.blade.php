@extends(Auth::user()->user_type == 'Admin' ? 'layouts.app' : 'layouts.waiter_app')
@section('title')
    Food
@endsection

@section('body')

<section class="vbox">
    <section class="scrollable padder">
        <ul class="breadcrumb no-border no-radius b-b b-light pull-in">
            <li><a href="index.html"><i class="fa fa-home"></i> Home</a></li>
        </ul>
        <div class="m-b-md">
            <h3 class="m-b-none">Food</h3>
        </div>
        <section class="panel panel-default">
            <header class="panel-heading">
                <i class="fa fa-info-sign text-muted" data-toggle="tooltip" data-placement="bottom" data-title="ajax to load the data."></i>
            </header>

            <div class="panel-body" align="center">
                <div class="col-sm-6" >
                    <div class="form-group">
                       <a href="{{ route('table.food_starter') }}" class="btn btn-primary">Starters</a>
                    </div>                    
                    <div class="form-group">
                       <a href="{{ route('table.food_main') }}" class="btn btn-primary">Main Dishes</a>
                    </div>
                    <div class="form-group">
                       <a href="{{ route('table.food_dessert') }}" class="btn btn-primary">Desserts</a>
                    </div>
                    <div class="form-group">
                       <a href="{{ route('table.create') }}" class="btn btn-default">Back</a>
                    </div>

                </div>
                    
            </div>

        </section>
    </section>
</section>

@endsection