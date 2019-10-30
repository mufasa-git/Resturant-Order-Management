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

            <div class="panel-body" align="center">
                <div class="col-sm-6">
                    <div class="form-group">
                       <a href="{{ route('waiter.create') }}" class="btn btn-primary">New Order</a>
                    </div>                    
                    <div class="form-group">
                       <button id="hit" class="btn btn-primary">Edit Order</button>

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
   
  $('#hit').click(function(){
    var gotoURL= "{{ route('table.edit_order') }}";
    var flag = 1;    
    $.ajax({
    url: "{{ route('table.edit_flag') }}",
    method: "POST",
    data: {
        _token: '{!! csrf_token() !!}',
        flag: flag
     },
    success: function(data){

        window.location.href = gotoURL;
    }});
    
  });
});

</script>
@endsection