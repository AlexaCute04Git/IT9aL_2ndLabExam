<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task Management System</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body {
            font-family: 'Times New Roman', Times, serif;
        }
    </style>
</head>
<body class="bg-pink-100 text-black">
    <nav class="bg-pink-600 p-6 text-black">
        <div class="container mx-auto flex justify-between items-center">
            <a href="{{ route('tasks.index') }}" class="text-2xl font-bold">Task Manager</a>
            <a href="{{ route('tasks.create') }}" class="bg-pink-700 px-6 py-3 rounded text-white text-lg">Add Task</a>
        </div>
    </nav>

    <div class="container mx-auto mt-8">
        @if (session('success'))
            <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-6 mb-6 text-lg">
                {{ session('success') }}
            </div>
        @endif

        @yield('content')

        <!-- Example Modal -->
        <div class="fixed inset-0 flex items-center justify-center z-50" id="modal" style="display: none;">
            <div class="bg-white rounded-lg shadow-lg p-8 w-1/3">
                <h2 class="text-xl font-bold mb-4">Modal Title</h2>
                <p class="mb-4">This is a medium-sized modal content area.</p>
                <div class="flex justify-end">
                    <button class="bg-pink-600 text-white px-4 py-2 rounded" onclick="closeModal()">Close</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        function closeModal() {
            document.getElementById('modal').style.display = 'none';
        }
        
        // Example function to open modal
        function openModal() {
            document.getElementById('modal').style.display = 'flex';
        }
    </script>
</body>
</html>