@extends('layouts.app')

@section('title')
    User
@endsection

@section('body')

<section class="vbox">
    <section class="scrollable padder">
        <ul class="breadcrumb no-border no-radius b-b b-light pull-in">
            <li><a href="{{url('/')}}"><i class="fa fa-home"></i> Home</a></li>
            <li class="active">Setting</li>
            <li class="active">User</li>
        </ul>
        <div class="m-b-md">
            <h3 class="m-b-none">User Setting</h3>
        </div>
        <section class="panel panel-default">
            <header class="panel-heading">
                <a href="{{ route('user.create') }}" class="btn btn-primary">Add User</a>
                <button onClick ="$('#table').tableExport({type:'csv',escape:'false'});" class="btn btn-default btn-xs pull-right">CSV</button>
                <button onClick ="$('#table').tableExport({type:'excel',escape:'false'});" class="btn btn-default btn-xs pull-right">Excel</i></button>
                <i class="fa fa-info-sign text-muted" data-toggle="tooltip" data-placement="bottom" data-title="ajax to load the data."></i>
            </header>
            <div class="table-responsive">
                <table class="table table-striped m-b-none" data-ride="datatables" id="table">
                    <thead>
                        <tr>
                            <th width="">Name</th>
                            <th width="">User Type</th>
                            <th width="">Email</th>
                            <th width="150px">Buttons</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($users as $user)
                            <tr>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->user_type }}</td>
                                <td>{{ $user->email }}</td>
                                <td>
                                    {{ Form::open(['route' => ['user.destroy', $user->id], 'method' => 'delete', 'style'=>'display:inline-block']) }}
                                        <button type="submit" class="btn btn-sm btn-icon btn-danger" onclick="return confirm('Are you sure you want to delete this?')" ><i class="fa fa-trash-o"></i></button>

                                    {{ Form::close() }}
                                    <a href="{{ route('user.edit',$user->id) }}" class="btn btn-sm btn-icon btn-warning"><i class="fa fa-edit"></i></a>

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