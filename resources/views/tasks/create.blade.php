@include('partials.header')
@include('partials.nav')

<main>
    <section class="max-w-4xl p-6 mx-auto bg-white rounded-md shadow-md dark:bg-gray-800 mt-20">
        <h1 class="text-lg font-semibold text-gray-700 capitalize dark:text-white">New Task</h1>
        <form method="POST" action="{{ route('tasks.store') }}">
            @csrf
            <div class="grid grid-cols-1 gap-6 mt-4 sm:grid-cols-1">
                <div>
                    <label class="text-gray-700 dark:text-gray-200">Admin Name</label>
                    <select name="assigned_by_id" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring" style="max-height: 150px; overflow-y: auto;">
                        <option> </option>
                        @foreach ($admins as $admin)
                        <option value="{{$admin->id}}">{{$admin->name}}</option>
                        @endforeach
                    </select>
                </div>
                
                <div>
                    <label class="text-gray-700 dark:text-gray-200">Title</label>
                    <input name="title" type="text" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring">
                </div>

                <div>
                    <label class="text-gray-700 dark:text-gray-200">Description</label>
                    <textarea name="description" id="textarea" type="textarea" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring"></textarea>
                </div>

                <div>
                    <label class="text-gray-700 dark:text-gray-200">Assigned To</label>
                    <select name="assigned_to_id" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring">
                        <option> </option>
                        @foreach ($users as $user)
                            <option value="{{$user->id}}"> {{$user->name}}</option>
                        @endforeach
                    </select>
                </div>

            </div>

            <div class="flex justify-end mt-6">
                <button type="submit" class="px-6 py-2 leading-5 text-white transition-colors duration-200 transform bg-gray-800 rounded-md hover:bg-gray-600 focus:outline-none focus:bg-gray-600">Save</button>
            </div>
        </form>
    </section>

</main>
@include('partials.footer')
