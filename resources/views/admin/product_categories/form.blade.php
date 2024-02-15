<x-app-layout>
    <div class="container mx-auto mt-8 px-4 sm:px-6 lg:px-8">
        <div class="bg-white shadow-sm rounded-lg overflow-hidden">
            <div class="p-6">
                <h1 class="text-xl font-semibold text-gray-900">{{ isset($product_category) ? 'Update' : 'Create' }} Category</h1>
            </div>

            <form action="{{ isset($product_category) ? route('product-categories.update', $product_category->id) : route('product-categories.store') }}" method="POST" class="divide-y divide-gray-200">
                @csrf
                @if (isset($product_category))
                    @method('PUT')
                @endif

                <div class="px-6 py-4 space-y-4">
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                        <input type="text" name="name" id="name" value="{{ isset($product_category) ? $product_category->name : old('name') }}"
                               class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                    </div>

                    <div>
                        <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                        <textarea name="description" id="description" rows="3" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">{{ isset($product_category) ? $product_category->description : old('description') }}</textarea>
                    </div>

                    <div>
                        <label for="parent_id" class="block text-sm font-medium text-gray-700">Parent Category</label>
                        <select name="parent_id" id="parent_id"
                                class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
                            <option value="" disabled>Select Parent Category</option>
                            @foreach ($parent_categories as $parent_category)
                                <option value="{{ $parent_category->id }}" {{ isset($product_category) && $product_category->parent_id === $parent_category->id ? 'selected' : '' }}>
                                    {{ $parent_category->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <label for="slug" class="block text-sm font-medium text-gray-700">Slug</label>
                        <input type="text" name="slug" id="slug" value="{{ isset($product_category) ? $product_category->slug : old('slug') }}"
                               class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                    </div>

                    <div>
                        <label for="status" class="block text-sm font-medium text-gray-700">Status</label>
                        <select name="status" id="status"
                                class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
                            <option value="active" {{ isset($product_category) && $product_category->status === 'active' ? 'selected' : '' }}>Active</option>
                            <option value="inactive" {{ isset($product_category) && $product_category->status === 'inactive' ? 'selected' : '' }}>Inactive</option>
                        </select>
                    </div>

                    <div>
                        <label for="meta_title" class="block text-sm font-medium text-gray-700">Meta Title</label>
                        <input type="text" name="meta_title" id="meta_title" value="{{ isset($product_category) ? $product_category->meta_title : old('meta_title') }}"
                               class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                    </div>

                    <div>
                        <label for="meta_description" class="block text-sm font-medium text-gray-700">Meta Description</label>
                        <textarea name="meta_description" id="meta_description" rows="3" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">{{ isset($product_category) ? $product_category->meta_description : old('meta_description') }}</textarea>
                    </div>

                    <div>
                        <label for="meta_keywords" class="block text-sm font-medium text-gray-700">Meta Keywords</label>
                        <input type="text" name="meta_keywords" id="meta_keywords" value="{{ isset($product_category) ? $product_category->meta_keywords : old('meta_keywords') }}"
                               class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                    </div>

                    <div class="pt-5">
                        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                            {{ isset($product_category) ? 'Update' : 'Create' }} Category
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
