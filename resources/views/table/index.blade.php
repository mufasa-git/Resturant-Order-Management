@extends(Auth::user()->user_type == 'Admin' ? 'layouts.app' : 'layouts.waiter_app')
@section('title')
    Table
@endsection

@section('body')

<section class="vbox">
    <section class="scrollable padder">
        <ul class="breadcrumb no-border no-radius b-b b-light pull-in">
            <li><a href="index.html"><i class="fa fa-home"></i> Home</a></li>
        </ul>
        <div class="m-b-md">
            <h3 class="m-b-none">Table Map</h3>
        </div>
        <section class="panel panel-default">
            <header class="panel-heading">
                <i class="fa fa-info-sign text-muted" data-toggle="tooltip" data-placement="bottom" data-title="ajax to load the data."></i>
            </header>

            <div class="panel-body" align="center">
                <div class="col-sm-6">
                    <div class="table-map">
                        @foreach($tables as $table )
                            <?php  
                                echo '<div class="col-md-6">';
                                ?>
                                @if($table->displayed == 0)
                                    <button onClick="setTableFunc(<?=$table->id?>)" class="btn2 btn-primary"><?=$table->id?></button>
                                @elseif($table->displayed == 1)
                                    <button onClick="setTableFunc2(<?=$table->id?>)" class="btn2 btn-danger"><?=$table->id?></button>
                                @endif
                                <?php
                                echo '</div>';                                
                            ?>
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
   
  setTableFunc=(id)=> {
    var gotoURL= "{{ route('table.create') }}";
    console.log("jason log");
    console.log(id);
    
    $.ajax({
    url: "{{ route('table.table_status') }}",
    method: "POST",
    data: {
        _token: '{!! csrf_token() !!}',
        tableid: id,
        status: "True"
     },
    success: function(data){
        window.location.href = gotoURL;
    }});
    
   }
    setTableFunc2=(id)=> {
        alert('Table'+id+' is full.');       
   }

});

</script>
@endsection