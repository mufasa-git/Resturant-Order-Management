@extends('layouts.app')

@section('title')
    Business
@endsection

@section('body')

<section class="vbox">
    <section class="scrollable padder">
        <ul class="breadcrumb no-border no-radius b-b b-light pull-in">
            <li><a href="index.html"><i class="fa fa-home"></i> Home</a></li>
            <li class="active">Setting</li>
            <li class="active">Business</li>
            <li class="active">Reset TAX</li>
        </ul>
        <div class="m-b-md">
            <h3 class="m-b-none">Business Setting</h3>
        </div>
        <section class="panel panel-default">
            <header class="panel-heading">
                <i class="fa fa-info-sign text-muted" data-toggle="tooltip" data-placement="bottom" data-title="ajax to load the data."></i>
                
                <a href="{{ route('business.store')  }}" class="btn btn-primary">Back</a>
                
            </header>

            <div class="panel-body">
                {!! Form::model($business, array('files' => true, 'method'=>'PATCH','route' => array('business.update', $business->id))) !!}
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>TAX 1</label>
                            {!! Form::number('tax1', null, ['placeholder'=>'Enter TAX1', 'class'=>'form-control input-lg','required']) !!}

                        </div>                     
                        <div class="form-group">
                            <label>TAX 2</label>
                            {!! Form::number('tax2', null, ['placeholder'=>'Enter TAX2', 'class'=>'form-control input-lg','required']) !!}
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