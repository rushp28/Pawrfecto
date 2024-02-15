<x-app-layout>
    <div class="container mx-auto mt-8 px-4 sm:px-6 lg:px-8">
        <div class="bg-white shadow-sm rounded-lg overflow-hidden">
            <div class="p-6">
                <h1 class="text-xl font-semibold text-gray-900">{{ isset($user) ? 'Update' : 'Create' }} User</h1>
            </div>

            <form method="post"
                  @if(isset($user) && $user->id)
                      action="{{ route('users.update', $user->id) }}"
                  @else
                      action="{{ route('users.store') }}"
                  @endif
                  class="divide-y divide-gray-200">
                @csrf
                @if(isset($user) && $user->id)
                    @method('PUT')
                @endif

                <div class="px-6 py-4 space-y-4">
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                        <input type="text" name="name" id="name" value="{{ isset($user) ? $user->name : old('name') }}"
                               class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                    </div>

                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                        <input type="email" name="email" id="email" value="{{ isset($user) ? $user->email : old('email') }}"
                               class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                    </div>

                    <div>
                        <label for="role" class="block text-sm font-medium text-gray-700">Role</label>
                        <select name="role" id="role"
                                class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
                            @foreach ($roles as $role)
                                <option value="{{ $role->value }}"
                                    {{ isset($user) && $user->role === $role->value ? 'selected' : '' }}>
                                    {{ ucfirst($role->name) }}
                                </option>
                            @endforeach
                        </select>

                    </div>

                    <div class="pt-5">
                        <button type="submit" class="bg-indigo-600 text-white px-4 py-2 rounded-lg hover:bg-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-600 focus:ring-offset-2 focus:ring-offset-gray-100">
                            {{ isset($user) ? 'Update' : 'Create' }} User
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
