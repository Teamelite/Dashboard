<div class="panel-body">
    <div class="table-responsive">
        <table class="table table-striped table-bordered table-hover">
            <thead>
            <tr>
                <th>#</th>
                <th>Status</th>
                <th>Submitted</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
                @foreach ($applications as $application)
                    <tr>
                        <td>{{ $application->id }}</td>
                        <td>{{ $application->status }}</td>
                        <td>{{ $application->created_at }}</td>
                        <td><a class="btn btn-default" href="{{ route('user.apply.edit', $application->id) }}">View</a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
