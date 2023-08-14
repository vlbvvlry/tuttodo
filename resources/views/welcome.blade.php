<x-app-layout>
    <fieldset class="p-4 border rounded-md">
        <legend class="w-full text-center border rounded-md mb-4">TUT-TODO</legend>

        @if ($tasks->isEmpty())
            {{-- Empty example --}}
            <div class="nborder text-center">
                <p>Oops.. No tasks. Let's go to add!</p>
            </div>
        @endif


        @foreach ($tasks as $task)
            <div class="flex flex-row py-2 px-6 flex items-center justify-between nborder">
                <div class="flex w-full nborder">
                    <input type="checkbox" class="mr-2">
                    <label class="text-gray-800" style="white-space: normal; overflow-wrap: anywhere;">{{ $task->content }}</label>
                </div>
                <form action="{{ url('remove/'.$task->id) }}" method="post" class="ml-4">
                    @csrf
                    {{ method_field('DELETE') }}
                    <input type="text" name="delete-task-{{ $task->id }}" hidden>
                    <x-primary-button>Remove</x-primary-button>
                </form>
            </div>
        @endforeach

    </fieldset>

    <form action="{{ route('tasks.add') }}" method="POST" class="container p-4 nborder">
        @csrf
            <x-text-input name="content" class="w-full"></x-text-input>
            <x-primary-button class="w-full mt-4 flex justify-center">Add</x-primary-button>
    </form>

    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <strong>Whoops! Something wrong!</strong>
            <br>
            <ul>
                @foreach ($errors as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

</x-app-layout>
