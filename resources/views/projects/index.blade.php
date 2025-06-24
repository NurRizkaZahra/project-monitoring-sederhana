<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Project Monitoring</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-blue-100">

    <div class="max-w-7xl mx-auto py-10 px-4">
        <h1 class="text-2xl font-bold text-center mb-8">Project Monitoring</h1>

        <div class="mb-4">
            <a href="{{ route('projects.create') }}"
               class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-md shadow transition">
                + Add Project
            </a>
        </div>

        <div class="bg-white rounded-lg shadow overflow-x-auto">
            <table class="w-full text-sm text-left">
                <thead class="bg-blue-200 text-gray-700 uppercase">
                    <tr>
                        <th class="px-4 py-3">Project Name</th>
                        <th class="px-4 py-3">Client</th>
                        <th class="px-4 py-3">Project Leader</th>
                        <th class="px-4 py-3">Start Date</th>
                        <th class="px-4 py-3">End Date</th>
                        <th class="px-4 py-3">Progress</th>
                        <th class="px-4 py-3 text-center">Action</th>
                    </tr>
                </thead>
                <tbody class="divide-y">
                    @forelse ($projects as $project)
                        <tr class="hover:bg-blue-50">
                            <td class="px-4 py-3">{{ $project->project_name }}</td>
                            <td class="px-4 py-3">{{ $project->client_name }}</td>
                            <td class="px-4 py-3 flex items-center gap-2">
                                @if ($project->leader_photo)
                                    <img src="{{ asset('storage/' . $project->leader_photo) }}"
                                         class="w-8 h-8 rounded-full object-cover border" alt="Photo">
                                @endif
                                <div>
                                    <div class="font-semibold">{{ $project->leader_name }}</div>
                                    <div class="text-gray-500 text-xs">{{ $project->leader_email }}</div>
                                </div>
                            </td>
                            <td class="px-4 py-3">{{ \Carbon\Carbon::parse($project->start_date)->format('d M Y') }}</td>
                            <td class="px-4 py-3">{{ \Carbon\Carbon::parse($project->end_date)->format('d M Y') }}</td>
                            <td class="px-4 py-3">
                                <div class="w-full bg-gray-200 rounded-full h-4 overflow-hidden">
                                    <div class="bg-blue-500 h-full text-xs text-center text-white leading-4 transition-all duration-300"
                                         style="width: {{ $project->progress }}%">
                                        {{ $project->progress }}%
                                    </div>
                                </div>
                            </td>
                            <td class="px-4 py-3 text-center">
                                <div class="flex items-center justify-center gap-2">
                                    <!-- Tombol Edit -->
                                    <a href="{{ route('projects.edit', $project->id) }}"
                                       class="bg-green-500 hover:bg-green-600 text-white px-3 py-1 rounded-md text-sm shadow transition"
                                       title="Edit">
                                        ✏️ Edit
                                    </a>

                                    <!-- Tombol Delete -->
                                    <form action="{{ route('projects.destroy', $project->id) }}" method="POST"
                                          onsubmit="return confirm('Are you sure?')" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                                class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded-md text-sm shadow transition"
                                                title="Delete">
                                            🗑️ Delete
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="px-4 py-6 text-center text-gray-500">Belum ada project.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <p class="text-sm text-gray-500 mt-8 text-right">
            Created by: <strong>Nur Rizka Zahra</strong>
        </p>
    </div>

</body>
</html>
