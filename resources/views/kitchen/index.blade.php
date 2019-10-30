@extends(Auth::user()->user_type == 'Admin' ? 'layouts.app' : 'layouts.kitchen_app')

@section('title')
    Kitchen
@endsection

@section('body')

<section class="vbox">
    <section class="scrollable padder">
        <ul class="breadcrumb no-border no-radius b-b b-light pull-in">
            <li><a href="index.html"><i class="fa fa-home"></i> Home</a></li>
        </ul>
        <div class="m-b-md">
            <h3 class="m-b-none">Kitchen</h3>
        </div>
        <section class="panel panel-default">
            <header class="panel-heading">
                <i class="fa fa-info-sign text-muted" data-toggle="tooltip" data-placement="bottom" data-title="ajax to load the data."></i>
            </header>

            <div class="panel-body">
                    <div class="col-sm-6">
                        <div class="form-group">
                            @foreach($order_infos as $order_info)
                                <div class="columns">
                                    <ul class="price">
                                        <li class="header">Table #{{ $order_info->table_id }}</li>
                                        @foreach($order_lists as $order_list)
                                            @if($order_list->order_info_id == $order_info->id)
                                                @if($order_list->product->category == 'Food')
                                                   <li> -- {{ $order_list->quantity }} &nbsp{{ $order_list->product->product_name }}</li>
                                                @endif
                                            @endif
                                        @endforeach
                                        <li class="grey">
                                            <button onClick="setThumbsFunc(<?=$order_info->table_id?>)" class="btn btn-primary" style="width: 50px"><i class="fa fa-thumbs-up" style="font-size: 23px" ></i></button>
                                            
                                            <button onClick="setCheckFunc(<?=$order_info->table_id?>)" class="btn btn-primary" style="width: 50px"><i class="fa fa-check" style="font-size: 23px"></i></button>
                                        </li>
                                    </ul>
                                </div>
                            @endforeach
                        </div>
                    </div>
            </div>

        </section>
    </section>
</section>

@endsection


@section('scripts')
<script>
$(document).ready(function(){
   
  setThumbsFunc=(id)=> {
    console.log(id);
    
    $.ajax({
    url: "{{ route('order_info.kitchen_thumbs') }}",
    method: "POST",
    data: {
        _token: '{!! csrf_token() !!}',
        tableid: id,
     },
    success: function(data){
    }});
        alert('Thumbs: Successfuly sent!');    
   }

  setCheckFunc=(id)=> {
    console.log(id);
    
    $.ajax({
    url: "{{ route('order_info.kitchen_check') }}",
    method: "POST",
    data: {
        _token: '{!! csrf_token() !!}',
        tableid: id,
     },
    success: function(data){
    }});
        alert('Check: Successfuly sent!');    
   }
});

</script>
@endsection