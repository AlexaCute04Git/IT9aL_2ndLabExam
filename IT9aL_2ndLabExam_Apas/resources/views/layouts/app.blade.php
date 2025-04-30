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
    <div class="container mx-auto flex items-center justify-between relative">
      <!-- Empty div to balance flex -->
      <div class="w-1/3"></div>
      
      <!-- Centered Title -->
      <div class="w-1/3 text-center">
        <a href="{{ route('tasks.index') }}" class="text-2xl font-bold">Task Manager</a>
      </div>
      
      <!-- Add Task Button -->
      <div class="w-1/3 flex justify-end">
        <button onclick="openModal()" class="bg-pink-700 px-6 py-3 rounded text-white text-lg">Add Task</button>
      </div>
    </div>
  </nav>

  <div class="container mx-auto mt-8">
    @if (session('success'))
      <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-6 mb-6 text-lg">
        {{ session('success') }}
      </div>
    @endif

    @yield('content')

    <!-- Modal Form -->
    <div class="fixed inset-0 flex items-center justify-center z-50 bg-black bg-opacity-50" id="modal" style="display: none;">
      <div class="bg-white rounded-lg shadow-lg p-8 w-full max-w-md">
        <h2 class="text-2xl font-bold mb-6 text-center text-pink-600">Add New Task</h2>
        <form action="{{ route('tasks.store') }}" method="POST">
          @csrf
          <div class="mb-4">
            <label class="block text-gray-700 mb-2" for="title">Title</label>
            <input type="text" name="title" id="title" required class="w-full px-4 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-pink-500">
          </div>
          <div class="mb-4">
            <label class="block text-gray-700 mb-2" for="description">Description</label>
            <textarea name="description" id="description" rows="4" class="w-full px-4 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-pink-500"></textarea>
          </div>
          <div class="mb-6">
            <label class="block text-gray-700 mb-2" for="is_completed">Status</label>
            <select name="is_completed" id="is_completed" class="w-full px-4 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-pink-500">
              <option value="0">Pending</option>
              <option value="1">Completed</option>
            </select>
          </div>
          <div class="flex justify-end space-x-4">
            <button type="button" class="px-4 py-2 bg-gray-300 rounded hover:bg-gray-400" onclick="closeModal()">Cancel</button>
            <button type="submit" class="px-6 py-2 bg-pink-600 text-white rounded hover:bg-pink-700">Save Task</button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <script>
    function openModal() {
      document.getElementById('modal').style.display = 'flex';
    }

    function closeModal() {
      document.getElementById('modal').style.display = 'none';
    }
  </script>

</body>
</html>
