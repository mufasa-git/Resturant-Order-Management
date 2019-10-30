@extends(Auth::user()->user_type == 'Admin' ? 'layouts.app' : 'layouts.waiter_app')
@section('title')
    Waiter
@endsection

@section('body')

<section class="vbox">
    <section class="scrollable padder">
        <ul class="breadcrumb no-border no-radius b-b b-light pull-in">
            <li><a href="{{url('/')}}"><i class="fa fa-home"></i> Home</a></li>
        </ul>
        <div class="m-b-md">
             @foreach($order_lists as $order_list )
                @if($order_list->order_info->table_id == $table->id && $order_list->order_info->status == 0)
                    <?php $name = $order_list->order_info->client_name; ?>
                @endif
            @endforeach
            <h3 class="m-b-none">Order for customer: {{ $name }}</h3>
        </div>

        <section class="panel panel-default">
            <header class="panel-heading">
                Orders Detail
                <button onClick ="$('#table').tableExport({type:'csv',escape:'false'});" class="btn btn-default btn-xs pull-right">CSV</button>
                <button onClick ="$('#table').tableExport({type:'excel',escape:'false'});" class="btn btn-default btn-xs pull-right">Excel</i></button>
                <i class="fa fa-info-sign text-muted" data-toggle="tooltip" data-placement="bottom" data-title="ajax to load the data."></i>
            </header>
            <div class="table-responsive">
                <table class="table table-striped m-b-none" data-ride="datatables" id="table">
                    <thead>
                        <tr>
                            <th width="">ID</th>
                            <th width="">Product</th>
                            <th width="">Price</th>
                        </tr>
                    </thead>        
                    <?php $sum = 0; $i = 0; $id =0;?>
                    <tbody>         
                        @foreach($order_lists as $order_list )
                            @if($order_list->order_info->table_id == $table->id && $order_list->order_info->status == 0)
                                <?php $id = $order_list->order_info->id; ?>
                                @if(isset($order_list->product))
                                <tr>
                                    <?php
                                        $i++;
                                    ?>
                                    <td>{{ $i }}</td>
                                    <td>{{ $order_list->product->product_name }}</td>
                                    <td>{{ $order_list->price_sum }}</td>
                                </tr>   
                                <?php                            
                                    $sum += $order_list->price_sum;
                                ?>
                                @endif
                            @endif
                        @endforeach
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td></td>                            
                            <td>Sub_Total</td>                            
                            <td>{{ $sum }}</td>                            
                        </tr>
                        <tr>
                            <td></td>                            
                            <td>TAX1</td>                            
                            <td>{{ $sum/100*$order_list->tax1 }}</td>                            
                        </tr>
                        <tr>
                            <td></td>                            
                            <td>TAX2</td>                            
                            <td>{{ $sum/100*$order_list->tax2 }}</td>                            
                        </tr>
                        <tr>
                            <td></td>                            
                            <td>Total</td>                            
                            <td>{{ $sum + $sum/100*$order_list->tax1 + $sum/100*$order_list->tax2 }}</td>                            
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="panel-body" align="center">
                <div class="col-md-12">
                    <button id="hit" class="btn btn-primary">Confirm</button>
                </div>
            </div>
        </section>        
    </section>
 </section>

@endsection
@section('scripts')

<script>
$(document).ready(function(){ 
    $('#hit').click(function(){
    var gotoURL= "{{ route('waiter.index') }}";

    $.ajax({
    url: "{{ route('table.final_confirm') }}",
    method: "POST",
    data: {
        _token: '{!! csrf_token() !!}',
        order_status: "True",
        table_status: "False",
        id: {{ $id }}
     },
    success: function(data){
       window.location.href = gotoURL;
    }});
   });
});

</script>
@endsection