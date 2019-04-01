@extends('layouts.app')

@section('content')
    <div class="container pt-64 pb-64">
        <div class="row">
            <form id="update_task_form" action="/admin/tasks/update" method="POST">
                {{ csrf_field() }}
                <input type="hidden" name="task_id" value="{{ $task->id }}">
                <input type="hidden" name="redirect_url" value="/admin/tasks">
                <div class="gray-box">
                    <div class="form-group">
                        <h5>Client: {{ App\Custom\ClientHelper::getCompanyName($task->client_id) }}</h5>
                    </div>

                    <div class="form-group">
                        <label>Task Status:</label>
                        <select class="form-control" form="update_task_form" name="status">
                            <option <?php if ($task->status == 0) { echo "selected"; } ?> value="0">Waiting Approval</option>
                            <option <?php if ($task->status == 1) { echo "selected"; } ?> value="1">Approved</option>
                            <option <?php if ($task->status == 2) { echo "selected"; } ?> value="2">Scheduled</option>
                            <option <?php if ($task->status == 3) { echo "selected"; } ?> value="3">In Progress</option>
                            <option <?php if ($task->status == 4) { echo "selected"; } ?> value="4">Done</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Title:</label>
                        <input type="text" class="form-control" name="title" value="{{ $task->title }}" required>
                    </div>

                    <div class="form-group">
                        <label>Description:</label>
                        <textarea class="form-control" form="update_task_form" cols="6" name="description" required>{{ $task->description }}</textarea>
                    </div>

                    <div class="form-group">
                        <label>Due Date:</label>
                        <input type="date" name="due_date" class="form-control" value="{{ $task->due_date }}" required>
                    </div>

                    <div class="form-group row">
                        <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                            <label>Reach:</label>
                            <input type="num" class="form-control" min="0" step="1" value="{{ $task->reach }}" name="reach">
                        </div>

                        <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                            <label>Impact:</label>
                            <input type="num" class="form-control" min="0" step="1" value="{{ $task->impact }}" name="impact">
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                            <label>Confidence:</label>
                            <input type="num" class="form-control" min="0" step="1" value="{{ $task->confidence }}" name="confidence">
                        </div>

                        <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                            <label>Ease:</label>
                            <input type="num" class="form-control" min="0" step="1" value="{{ $task->ease }}" name="ease">
                        </div>
                    </div>

                    <div class="form-group">
                        <input type="submit" class="primary_btn centered pr-4 pl-4" value="Update Task">
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection