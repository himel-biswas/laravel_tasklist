@extends('layouts.app')

@section('content')

    <div class="panel panel-default">
        <div class="panel-body">
            @include('common.errors')
            <form action="{{ url('task') }}" class="form-horizontal" method="post" role="form">
                <div class="form-group">
                    <label class="col-sm-3 control-label" for="name">
                        TaskList
                    </label>
                    <div class="col-sm-6">
                        <input class="form-control" id="name" name="name" title="" type="text" value="">
                        </input>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-3 col-sm-6 ">
                        <button class="btn btn-primary" type="submit">
                            Add tasks
                        </button>
                    </div>
                </div>
                {{ csrf_field()}}  {{-- {{ cross-site request forgery}} --}}
            </form>

        </div>
        @if ($tasks->count())
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">
                    <span><b><center>Current Tasks</center></b></span>
                </h3>
            </div>
            <div class="panel-body">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>
                                Tasks
                            </th>
                            <th>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($tasks as $task)
                        <tr>
                            <td>
                                {{ $task->name }}
                            </td>
                            <td>
                                <form action="{{ url('task/'. $task->id) }}" class="form-horizontal" method="post" role="form">
                                    <button class="btn btn-danger" type="submit">
                                        Delete
                                    </button>
                                    {{ method_field('delete')}}
                                    {{ csrf_field()}}
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        @endif {{--end of if--}}
    </div>
@stop {{--end of section--}}
