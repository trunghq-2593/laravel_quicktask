<!-- resources/views/tasks.blade.php -->
<?php
use \App\Models\User;
$users = User::where('isAdmin', '=', 1)->get();
?>

@extends('layouts.app')

@section('content')
    @if(session('message'))
        <div class="container alert alert-success">
            {{session('message')}}
        </div>
    @endif
    @if(\Illuminate\Support\Facades\Auth::user()->isAdmin == 0)
        <section class="content">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="card-tools">
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body table-responsive p-0">
                                <table class="table table-hover text-nowrap">
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>{{__('name')}}</th>
                                        <th>Email</th>
                                        <th>{{__('task')}}</th>
                                        {{--                                        <th>Ngày tạo</th>--}}
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($users as $user)
                                        <tr>
                                            <td>{{$user->id}}</td>
                                            <td>{{$user->name}}</td>
                                            <td>{{$user->email}}</td>
                                            <td>
                                                <details>
                                                    <summary>{{__('task')}}</summary>
                                                    @if(!empty($user->task))
                                                        @foreach($user->task as $task)
                                                            <p style="margin-bottom: 0px">-{{$task->name}}</p>
                                                        @endforeach
                                                    @else
                                                        <p>{{__('taskNotFound')}}</p>
                                                    @endif
                                                </details>
                                            </td>
                                            {{--                                            <td>{{$user->task->first()->created_at->format('d/m/y')}}</td>--}}
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                </div>
            </div>
        </section>
    @else
        <!-- Bootstrap Boilerplate... -->

        <div class="panel-body container">
            <!-- Display Validation Errors -->
        @include('common.errors')

        <!-- New Task Form -->
            <form action="{{ url('task') }}" method="POST" class="form-horizontal">
            {{ csrf_field() }}

            <!-- Task Name -->
                <div class="form-group">
                    <label for="task" class="col-sm-3 control-label">{{__('task')}}</label>

                    <div class="col-sm-6">
                        <input type="text" name="name" id="task-name" class="form-control">
                    </div>
                </div>

                <!-- Add Task Button -->
                <div class="form-group">
                    <div class="col-sm-offset-3 col-sm-6">
                        <button type="submit" class="btn btn-default">
                            <i class="fa fa-plus"></i> {{__('addTask')}}
                        </button>
                    </div>
                </div>
            </form>
        </div>

        <!-- TODO: Current Tasks -->
        @if (count($tasks) > 0)
            <div class="panel panel-default container">
                <div class="panel-body">
                    <table class="table table-striped task-table">

                        <!-- Table Headings -->
                        <thead>
                        <th>{{__('task')}}</th>
                        <th>&nbsp;</th>
                        </thead>

                        <!-- Table Body -->
                        <tbody>
                        @foreach ($tasks as $task)
                            <tr>
                                <!-- Task Name -->
                                <td class="table-text">
                                    <div>{{ $task->name }}</div>
                                </td>

                                <!-- Delete Button -->
                                <td>
                                    <form action="{{ url('task/'.$task->id) }}" method="POST">
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}

                                        <button type="submit" class="btn btn-danger">
                                            <i class="fa fa-trash"></i> Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        @endif
    @endif
@endsection
