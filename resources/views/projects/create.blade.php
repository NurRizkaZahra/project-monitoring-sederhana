<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Project</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-blue-50">
    <div class="max-w-2xl mx-auto py-10 px-6">
        <h1 class="text-2xl font-bold mb-6 text-center">Add New Project</h1>

        <form action="{{ route('projects.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
            @csrf

            <div>
                <label class="block font-medium">Project Name</label>
                <input type="text" name="project_name" class="w-full border border-gray-300 rounded px-3 py-2" required>
            </div>

            <div>
                <label class="block font-medium">Client Name</label>
                <input type="text" name="client_name" class="w-full border border-gray-300 rounded px-3 py-2" required>
            </div>

            <div>
                <label class="block font-medium">Leader Name</label>
                <input type="text" name="leader_name" class="w-full border border-gray-300 rounded px-3 py-2" required>
            </div>

            <div>
                <label class="block font-medium">Leader Email</label>
                <input type="email" name="leader_email" class="w-full border border-gray-300 rounded px-3 py-2" required>
            </div>

            <div>
                <label class="block font-medium">Leader Photo</label>
                <input type="file" name="leader_photo" class="w-full">
            </div>

            <div>
                <label class="block font-medium">Start Date</label>
                <input type="date" name="start_date" class="w-full border border-gray-300 rounded px-3 py-2" required>
            </div>

            <div>
                <label class="block font-medium">End Date</label>
                <input type="date" name="end_date" class="w-full border border-gray-300 rounded px-3 py-2" required>
            </div>

            <div>
                <label class="block font-medium">Progress (%)</label>
                <input type="number" name="progress" min="0" max="100" class="w-full border border-gray-300 rounded px-3 py-2" required>
            </div>

            <div class="flex justify-between items-center mt-6">
                <a href="{{ route('projects.index') }}" class="text-blue-600 hover:underline">← Back</a>
                <button type="submit" class="bg-blue-600 text-white px-5 py-2 rounded hover:bg-blue-700">Save</button>
            </div>
        </form>
    </div>
</body>
</html>
