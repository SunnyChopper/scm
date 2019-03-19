<h3>New Task</h3>
<p>Hi {{ $first_name }},</p>
<p>There's a new task with SunnyChopper Media.</p>
<p><strong>Title:</strong> {{ $title }}</p>
<p><strong>Description: </strong> {{ $description }}</p>
<p><strong>Due Date: </strong> {{ $due_date }}</p>
<p><strong>Status: </strong>
    @if($status == 0)
    Waiting Approval
    @elseif($status == 1)
    Approved
    @elseif($status == 2)
    Scheduled
    @elseif($status == 3)
    In Progress
    @elseif($status == 4)
    Done
    @endif
</p>
<p>If you have any questions or comments, you may log into your client dashboard using this <a href="{{ url('/clients/login') }}">link</a> or simply reply to this email.</p>
<p>Thanks,<br>SunnyChopper Media</p>