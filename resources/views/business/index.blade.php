@extends('layouts.app')

@section('title')
    Add Product
@endsection

@section('body')

<section class="vbox">
    <section class="scrollable padder">
        <ul class="breadcrumb no-border no-radius b-b b-light pull-in">
            <li><a href="index.html"><i class="fa fa-home"></i> Home</a></li>
            <li class="active">Setting</li>
            <li class="active">Business</li>
        </ul>
        <div class="m-b-md">
            <h3 class="m-b-none">Business Setting</h3>
        </div>
        <section class="panel panel-default">
            <header class="panel-heading">
                <i class="fa fa-info-sign text-muted" data-toggle="tooltip" data-placement="bottom" data-title="ajax to load the data."></i>
                @foreach($businesses as $business )
                <a href="{{ route('business.edit',$business->id)  }}" class="btn btn-primary">Reset TAX</a>
                @endforeach
            </header>

            <div class="panel-body">
                {!! Form::open(array('route'=>'business.store', 'files' => true, 'method' => 'post')) !!}
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>TAX 1</label>
                            {!! Form::number('tax1', '', ['placeholder'=>'Enter TAX1', 'class'=>'form-control input-lg','required']) !!}
                        </div>

                       
                        <div class="form-group">
                            <label>TAX 2</label>
                            {!! Form::number('tax2', '', ['placeholder'=>'Enter TAX2', 'class'=>'form-control input-lg','required']) !!}
                        </div>
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