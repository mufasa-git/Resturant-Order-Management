@extends(Auth::user()->user_type == 'Admin' ? 'layouts.app' : 'layouts.waiter_app')

@section('title')
    Drink
@endsection

@section('body')

<section class="vbox">
    <section class="scrollable padder">
        <ul class="breadcrumb no-border no-radius b-b b-light pull-in">
            <li><a href="index.html"><i class="fa fa-home"></i> Home</a></li>
        </ul>
        <div class="m-b-md">
            <h3 class="m-b-none">Alcoholic</h3>
        </div>
        <section class="panel panel-default">
            <header class="panel-heading">
                <i class="fa fa-info-sign text-muted" data-toggle="tooltip" data-placement="bottom" data-title="ajax to load the data."></i>
            </header>

            <div class="panel-body" align="center">
                <div class="col-sm-6" >
                    <div class="form-group">
                        <div class="table-map1">
                            @foreach($products as $product)
                                <form action="{{ route('table.quantity_confirm', ['id' => $product->id]) }}" method="get">
                                    @if($product->sub_category == 'alcholo')
                                        <input type="image" src="productPhoto/{{$product->product_photo}}" alt="Submit" width="100" height="100">
                                        <label>{{$product->product_name}}</label>
                                    @endif
                                </form>
                            @endforeach
                        </div>                        
                    </div>                    
                    <div class="form-group">
                       <a href="{{ route('table.show_drink') }}" class="btn btn-default">Back</a>
                    </div>

                </div>
                    
            </div>

        </section>
    </section>
</section>

@endsection