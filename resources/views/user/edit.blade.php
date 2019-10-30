@extends('layouts.app')

@section('title')
    User
@endsection

@section('body')

<section class="vbox">
    <section class="scrollable padder">
        <ul class="breadcrumb no-border no-radius b-b b-light pull-in">
            <li><a href="index.html"><i class="fa fa-home"></i> Home</a></li>
            <li class="active">Setting</li>
            <li class="active">User</li>
            <li class="active">Edit User</li>
        </ul>
        <div class="m-b-md">
            <h3 class="m-b-none">Edit a User</h3>
        </div>
        <section class="panel panel-default">
            <header class="panel-heading">
                Edit User
                <i class="fa fa-info-sign text-muted" data-toggle="tooltip" data-placement="bottom" data-title="ajax to load the data."></i>
            </header>

            <div class="panel-body">
            	{!! Form::model($user, array('files' => true, 'method'=>'PATCH','route' => array('user.update', $user->id))) !!}
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Name</label>
                            {!! Form::text('name', null, ['placeholder'=>'Enter user name', 'class'=>'form-control input-lg','required']) !!}
                        </div>
                        <div class="form-group">
                            <label>User Type</label>
                            {!! Form::select('user_type', array( 'Admin' => 'Admin', 'Waiter' => 'Waiter', 'Bartender' => 'Bartender', 'Kitchen' => 'Kitchen'), null, ['class'=>'form-control m-b input-lg','required']) !!}
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            {!! Form::text('email', null, ['placeholder'=>'Enter user email', 'class'=>'form-control input-lg','required']) !!}
                        </div>
                    </div>
                    
                    <div class="col-sm-6">
                        <img src="{{ asset('images/lock.jpg') }}" width="80%" class="pull-right">
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