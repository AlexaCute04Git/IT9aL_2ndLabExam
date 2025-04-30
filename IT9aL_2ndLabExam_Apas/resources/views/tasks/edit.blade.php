@extends("layouts.app")

@section("content")
    <h1 class="text-3xl font-bold mb-6 text-center text-pink-600">Edit Task</h1>
    <div class="bg-white p-8 rounded-2xl shadow-lg max-w-2xl mx-auto">
        <form action="{{ route("tasks.update", $task->id) }}" method="POST" class="space-y-6">
            @csrf
            @method("PUT")

            <div>
                <label for="title" class="block text-gray-700 font-semibold mb-2">Title</label>
                <input type="text" name="title" id="title" 
                    value="{{ old("title", $task->title) }}" 
                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-pink-500 @error("title") border-red-500 @enderror">
                @error("title")
                    <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="description" class="block text-gray-700 font-semibold mb-2">Description</label>
                <textarea name="description" id="description" rows="4"
                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-pink-500 resize-y @error("description") border-red-500 @enderror"
                    oninput="this.style.height = ''; this.style.height = this.scrollHeight + 'px'">{{ old("description", $task->description) }}</textarea>
                @error("description")
                    <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="is_completed" class="flex items-center text-gray-700 font-semibold">
                    <input type="checkbox" name="is_completed" id="is_completed" value="1" 
                        {{ $task->is_completed ? "checked" : "" }} 
                        class="mr-3 h-5 w-5 text-pink-600 focus:ring-pink-500 border-gray-300 rounded">
                    Completed
                </label>
            </div>

            <div class="flex justify-end space-x-4">
                <a href="{{ route('tasks.index') }}" class="bg-gray-300 px-6 py-2 rounded-lg hover:bg-gray-400 text-black">Cancel</a>
                <button type="submit" class="bg-pink-600 px-6 py-2 rounded-lg text-white hover:bg-pink-700">Update Task</button>
            </div>

        </form>
    </div>
@endsection
