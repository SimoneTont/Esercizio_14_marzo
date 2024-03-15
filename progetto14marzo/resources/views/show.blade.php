<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Project Details</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container">
        <h1 class="mt-5 mb-4">Project Details</h1>

        <h2>{{ $project->name }}</h2>

        <h3>Author: {{ $project->user->name }}</h3>

        <h4>Activities:</h4>
        <ol>
            @foreach($project->activities as $activity)
            <li>{{ $activity->name }}</li>
            @endforeach
        </ol>
    </div>
</body>

</html>
