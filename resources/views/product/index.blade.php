@extends('layouts.app')

@section('title')
    Item
@endsection

@section('body')

<section class="vbox">
    <section class="scrollable padder">
        <ul class="breadcrumb no-border no-radius b-b b-light pull-in">
            <li><a href="{{url('/')}}"><i class="fa fa-home"></i> Home</a></li>
            <li class="active">Setting</li>
            <li class="active">Item</li>
        </ul>
        <div class="m-b-md">
            <h3 class="m-b-none">All Item</h3>
        </div>
        <section class="panel panel-default">
            <header class="panel-heading">
                <a href="{{ route('product.create') }}" class="btn btn-primary">Add Item</a>
                <button onClick ="$('#table').tableExport({type:'csv',escape:'false'});" class="btn btn-default btn-xs pull-right">CSV</button>
                <button onClick ="$('#table').tableExport({type:'excel',escape:'false'});" class="btn btn-default btn-xs pull-right">Excel</i></button>
                <i class="fa fa-info-sign text-muted" data-toggle="tooltip" data-placement="bottom" data-title="ajax to load the data."></i>
            </header>
            <div class="table-responsive">
                <table class="table table-striped m-b-none" data-ride="datatables" id="table">
                    <thead>
                        <tr>
                            <th width="">Name</th>
                            <th width="8%">Photo</th>
                            <th width="">Category</th>
                            <th width="">Sub_Category</th>
                            <th width="">Price</th>
                            <th width="">Extra Items</th>
                            <th width="150px">Buttons</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($products as $product )
                            <tr>
                                <td>{{ $product->product_name }}</td>
                                <td><img src="productPhoto/{{$product->product_photo}}" width="100px" height="100px"></td>
                                <td>{{ $product->category }}</td>
                                <td>{{ $product->sub_category }}</td>
                                <td>{{ $product->price }}</td>
                                <td>
                                <?php
                                    $obj_name = json_decode($product->extra_name, TRUE);
                                    $obj_price = json_decode($product->extra_price, TRUE);
                                    if (is_array($obj_name) && !empty($obj_name))    
                                    {
                                        foreach($obj_name as $key => $value) 
                                        {
                                            echo $value.' : '.$obj_price[$key].'<br>';
                                        }
                                    }
                                ?>
                                </td>
                                <td>
                                    {{ Form::open(['route' => ['product.destroy', $product->id], 'method' => 'delete', 'style'=>'display:inline-block']) }}
                                        <button type="submit" class="btn btn-sm btn-icon btn-danger" onclick="return confirm('Are you sure you want to delete this?')" ><i class="fa fa-trash-o"></i></button>

                                    {{ Form::close() }}
                                    <a href="{{ route('product.edit',$product->id) }}" class="btn btn-sm btn-icon btn-warning"><i class="fa fa-edit"></i></a>

                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </section>
    </section>
 </section>

@endsection