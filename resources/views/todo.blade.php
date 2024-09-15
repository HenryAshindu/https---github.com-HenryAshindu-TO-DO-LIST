<x-layout>
    <div class="container mx-auto mt-10">
        <div class="max-w-md mx-auto bg-white shadow-lg rounded-lg overflow-hidden">
            <div class="p-5">
                <h2 class="text-2xl font-semibold text-gray-700 text-center">To-Do List</h2>
                <!-- Add Task Form -->
                <form action="{{ route('tasks.store') }}" method="POST" class="mt-5">
                    @csrf
                    <div class="flex">
                        <input type="text" name="task" class="w-full text-white px-4 py-2 border rounded-l-lg focus:outline-none" placeholder="Add a new task">
                        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-r-lg">Add</button>
                    </div>
                </form>
                <!-- Tasks List -->
                <ul class="mt-6 space-y-3">
                    @foreach ($tasks as $task)
                        <li class="flex justify-between items-center p-3 bg-gray-100 rounded-lg shadow">
                            <div class="flex items-center space-x-4">
                                <!-- Mark as completed -->
                                <form action="{{ route('tasks.update', $task->id) }}" method="POST" class="inline">
                                    @csrf
                                    @method('PUT')
                                    <button type="submit" class="bg-green-500 text-white p-2 rounded-lg">
                                        {{ $task->completed ? 'Undo' : 'Complete' }}
                                    </button>
                                </form>
                                <span class="text-lg {{ $task->completed ? 'line-through text-gray-500' : '' }}">
                                    {{ $task->name }}
                                </span>
                            </div>
                            <!-- Delete Task -->
                            <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-500 text-white p-2 rounded-lg">Delete</button>
                            </form>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</x-layout>