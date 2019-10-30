@extends('layouts.app')

@section('title')
    Item
@endsection

@section('body')

<section class="vbox">
    <section class="scrollable padder">
        <ul class="breadcrumb no-border no-radius b-b b-light pull-in">
            <li><a href="index.html"><i class="fa fa-home"></i> Home</a></li>
            <li class="active">Setting</li>
            <li class="active">All Item</li>
            <li class="active">Add Item</li>
        </ul>
        <div class="m-b-md">
            <h3 class="m-b-none">Add a Item</h3>
        </div>
        <section class="panel panel-default">
            <header class="panel-heading">
                Add Item
                <i class="fa fa-info-sign text-muted" data-toggle="tooltip" data-placement="bottom" data-title="ajax to load the data."></i>
            </header>

            <div class="panel-body">
                {!! Form::open(array('route'=>'product.store', 'files' => true, 'method' => 'post')) !!}
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Product Name</label>
                            {!! Form::text('product_name', '', ['placeholder'=>'Enter product name', 'class'=>'form-control input-lg','required']) !!}
                        </div>
                        <div class="form-group">
                            <label>Product Category</label>
                             {!! Form::select('category', array( 'Drink' => 'Drink', 'Food' => 'Food'), null, ['class'=>'form-control m-b input-lg','required']) !!}
                        </div>
                        <div class="form-group">
                            <label>Product Sub_Category</label>
                             {!! Form::select('sub_category', array( 'Alcohol' => 'Alcohol', 'Non-Alcohol' => 'Non-Alcohol', 'Starters' => 'Starters', 'Main Dishes' => 'Main Dishes', 'Desserts' => 'Desserts'), null, ['class'=>'form-control m-b input-lg','required']) !!}
                        </div>
                        <div class="form-group">
                            <label>Product Price</label>
                            {!! Form::number('price', '', ['placeholder'=>'Enter product price', 'class'=>'form-control input-lg','required']) !!}
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label>Product Photo</label>
                        <div class="col-md-6">
                            <input type="file" name="photo" required >
                        </div>
                    </div>
                    <br>
                    <div class="form-group">    
                        <div class="col-md-6">
                            <button type="button" id="addextrabtn" class="btn btn-primary">Add Extra</button>
                        </div>
                        <div id="demo"> </div>
                    </div>
                    <div class="col-md-12">
                        <div class="line line-dashed line-lg pull-in"></div>
                        {!! Form::submit('Submit', [ 'class'=>'btn btn-default']) !!}
                    </div>


                {!! Form::close() !!}
            </div>

        </section>
    </section>
</section>

@endsection
@section('scripts')
<script>
$(document).ready(function(){
    var i = 1;
  $("#addextrabtn").click(function(){
    $('#demo').append(`
        <div class="form-group">
            <div class="col-md-6">
                <input type="text" name="extraName[`+i+`]" placeholder="Extra Name" class="form-control input-lg"/>
                <input type="number" name="extraPrice[`+i+`]" placeholder="Extra Price" class="form-control input-lg"/>
            </div>
        </div>
    `);
    i++;
  });
});
</script>
@endsection