<x-app-layout>
    <div class="container mx-auto mt-1">
        <div class="bg-white shadow-sm rounded-lg overflow-hidden">
            <div class="p-6">
                @if (session('success'))
                    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                        <strong class="font-bold">Success!</strong>
                        <span class="block sm:inline">{{ session('success') }}</span>
                    </div>
                @endif

                <div class="flex justify-between items-center">
                    <h1 class="text-base font-semibold text-gray-900">Product Categories</h1>
                    <a href="{{ route('product-categories.create') }}" class="block rounded-md bg-indigo-600 px-3 py-2 text-center text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                        Create Category
                    </a>
                </div>

                <p class="text-gray-600 text-sm mt-2">A list of all the product categories in your account including their name, description, slug, status, meta title, meta description, meta keywords, and actions.</p>
            </div>

            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead>
                    <tr>
                        <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID</th>
                        <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name</th>
                        <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Description</th>
                        <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Parent ID</th>
                        <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Slug</th>
                        <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                        <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Meta Title</th>
                        <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Meta Description</th>
                        <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Meta Keywords</th>
                        <th scope="col" class="px-6 py-3 bg-gray-50"></th>
                    </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                    @foreach ($product_categories as $product_category)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $product_category->id }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $product_category->name }}</td>
                            <td class="px-6 py-4 whitespace-normal text-sm text-gray-900">{{ $product_category->description }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $product_category->parent_id }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $product_category->slug }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $product_category->status }}</td>
                            <td class="px-6 py-4 whitespace-normal text-sm text-gray-900">{{ $product_category->meta_title }}</td>
                            <td class="px-6 py-4 whitespace-normal text-sm text-gray-900">{{ $product_category->meta_description }}</td>
                            <td class="px-6 py-4 whitespace-normal text-sm text-gray-900">{{ $product_category->meta_keywords }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                <div class="flex items-center space-x-2">
                                    <a href="{{ route('product-categories.show', $product_category->id) }}" class="text-indigo-600 hover:text-indigo-900">Show</a>
                                    <a href="{{ route('product-categories.edit', $product_category->id) }}" class="text-indigo-600 hover:text-indigo-900">Edit</a>
                                    <form action="{{ route('product-categories.destroy', $product_category->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-600 hover:text-red-900">Delete</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>

            <div class="px-6 py-4">
                {{ $product_categories->links() }}
            </div>
        </div>
    </div>

</x-app-layout>
