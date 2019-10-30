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
            <h3 class="m-b-none">Quantity</h3>
        </div>
        <section class="panel panel-default">
            <header class="panel-heading">
                <i class="fa fa-info-sign text-muted" data-toggle="tooltip" data-placement="bottom" data-title="ajax to load the data."></i>
            </header>

            <div class="panel-body" align="center">
                <div class="col-sm-12" >
                    <div class="form-group">
                        <input type="image" src="../productPhoto/{{$product->product_photo}}" alt="Submit" width="100" height="100">
                        <br>       
                        <label>{{$product->product_name}}</label>
                    </div>

                    <div class="center">      
                        <input type="text" name="comment" class="form-control input-text" width="100" height="100">  
                        <p></p>
                            <div class="input-group">
                                <span class="input-group-btn">
                                    <button type="button" class="btn btn-danger btn-number"  data-type="minus" data-field="quant[2]">
                                        <i class="fa fa-minus"></i>
                                    </button>
                                </span>
                                <input type="text" id="quantity" name="quant[2]" class="form-control input-number" value="1" min="1" max="100" style="text-align: center;">
                                <span class="input-group-btn">
                                    <button type="button" class="btn btn-success btn-number" data-type="plus" data-field="quant[2]">
                                        <i class="fa fa-plus"></i>
                                    </button>
                                  </span>
                            </div>
                        <p></p>
                    </div>
                    <div class="form-group">
                        @if($product->category == 'Drink')
                            <button id="confirm1" class="btn btn-primary">Confirm</button>
                        @elseif($product->category == 'Food')
                            <button id="confirm2" class="btn btn-primary">Confirm</button>

                        @endif
                        
                    </div>                    
                    <div class="form-group">
                       <a href="{{ route('table.create') }}" class="btn btn-primary">Cancel</a>
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

$('.btn-number').click(function(e){
    e.preventDefault();
    
    fieldName = $(this).attr('data-field');
    type      = $(this).attr('data-type');
    var input = $("input[name='"+fieldName+"']");
    var currentVal = parseInt(input.val());

    if (!isNaN(currentVal)) {
        if(type == 'minus') {
            
            if(currentVal > input.attr('min')) {
                input.val(currentVal - 1).change();
            } 
            if(parseInt(input.val()) == input.attr('min')) {
                $(this).attr('disabled', true);
            }

        } else if(type == 'plus') {

            if(currentVal < input.attr('max')) {
                input.val(currentVal + 1).change();
            }
            if(parseInt(input.val()) == input.attr('max')) {
                $(this).attr('disabled', true);
            }

        }
    } else {
        input.val(0);
    }
});
$('.input-number').focusin(function(){
   $(this).data('oldValue', $(this).val());
});
$('.input-number').change(function() {
    
    minValue =  parseInt($(this).attr('min'));
    maxValue =  parseInt($(this).attr('max'));
    valueCurrent = parseInt($(this).val());
    
    name = $(this).attr('name');
    if(valueCurrent >= minValue) {
        $(".btn-number[data-type='minus'][data-field='"+name+"']").removeAttr('disabled')
    } else {
        alert('Sorry, the minimum value was reached');
        $(this).val($(this).data('oldValue'));
    }
    if(valueCurrent <= maxValue) {
        $(".btn-number[data-type='plus'][data-field='"+name+"']").removeAttr('disabled')
    } else {
        alert('Sorry, the maximum value was reached');
        $(this).val($(this).data('oldValue'));
    }
    
    
});
$(".input-number").keydown(function (e) {
        // Allow: backspace, delete, tab, escape, enter and .
        if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 190]) !== -1 ||
             // Allow: Ctrl+A
            (e.keyCode == 65 && e.ctrlKey === true) || 
             // Allow: home, end, left, right
            (e.keyCode >= 35 && e.keyCode <= 39)) {
                 // let it happen, don't do anything
                 return;
        }
        // Ensure that it is a number and stop the keypress
        if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
            e.preventDefault();
        }
});

$('#confirm1').click(function(){
    var gotoURL= "{{ route('table.another_drink') }}";
    var quantity = $('#quantity').val();
    var product_id = "{{$product->id}}";
    console.log(product_id);
    console.log("abc");
    $.ajax({
    url: "{{ route('table.order_list') }}",
    method: "POST",
    data: {
        _token: '{!! csrf_token() !!}',
        quantity: quantity,
        product_id: product_id
     },
    success: function(data){
        
       window.location.href = gotoURL;
    }});

});

$('#confirm2').click(function(){
    var gotoURL= "{{ route('table.another_food') }}";
    var quantity = $('#quantity').val();
    var product_id = "{{$product->id}}";
    console.log(product_id);
    console.log("abc");
    $.ajax({
    url: "{{ route('table.order_list') }}",
    method: "POST",
    data: {
        _token: '{!! csrf_token() !!}',
        quantity: quantity,
        product_id: product_id
     },
    success: function(data){
        
       window.location.href = gotoURL;
    }});

});

});


</script>
@endsection