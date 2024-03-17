<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Project</title>
    <!-- Link to Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container">

        <h1 class="mt-5 mb-4">Edit Project</h1>
        <a href="{{ route('projects.index') }}" class="btn btn-secondary">Back to Homepage</a>
        
        <form action="{{ route('projects.update', $project->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="name" class="form-label">Project Name</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $project->name }}">
            </div>
            <button type="submit" class="btn btn-primary mb-3">Update Project Name</button>
        </form>

        <div class="mb-3">
            <h2>Project Activities</h2>
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($project->activities as $activity)
                    <tr>
                        <td>{{ $activity->id }}</td>
                        <td>{{ $activity->name }}</td>
                        <td>
                            <form action="{{ route('projects.destroyActivity', ['id' => $project->id, 'activity_id' => $activity->id]) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this activity?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="mb-3">
            <h2>Add New Activity</h2>
            <form action="{{ route('projects.addActivity', $project->id) }}" method="POST">
                @csrf
                <label for="activity_name" class="form-label">Activity Name</label>
                <input type="text" class="form-control" id="activity_name" name="activity_name">
                <button type="submit" class="btn btn-primary mt-3">Add Activity</button>
            </form>
        </div>
        
    </div>
</body>

</html>
