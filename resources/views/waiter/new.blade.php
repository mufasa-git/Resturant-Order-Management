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
            <h3 class="m-b-none">Waiter</h3>
        </div>
        <section class="panel panel-default">
            <header class="panel-heading">
                <i class="fa fa-info-sign text-muted" data-toggle="tooltip" data-placement="bottom" data-title="ajax to load the data."></i>
            </header>

             <div class="panel-body">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>TAX Number</label>
                                <input id="tax_num" type="number" placeholder="Enter Tax Number" class="form-control input-lg" />
                        </div>
                        <div class="form-group">
                            <label>Client Name</label>
                                <input id="client_name" type="text" placeholder="Enter Client Name" class="form-control input-lg"/>
                        </div>
                    </div>
                    
                    <div class="col-md-12">
                        <div class="line line-dashed line-lg pull-in"></div>
                            <button id="hit" class="btn btn-primary" style="width: 70px">Ok</button>
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
    var gotoURL= "{{ route('table.index') }}";
    var tax_num = $('#tax_num').val();
    var client_name = $('#client_name').val();
    console.log(tax_num);
    
    $.ajax({
    url: "{{ route('table.order_info') }}",
    method: "POST",
    data: {
        _token: '{!! csrf_token() !!}',
        tax_num: tax_num,
        client_name: client_name
     },
    success: function(data){
        console.log(client_name);
        window.location.href = gotoURL;
    }});
    
  });
});

</script>
@endsection


 