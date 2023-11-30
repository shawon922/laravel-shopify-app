@extends('layouts.master')

@section('content')
    <div class="max-w-screen-xl mx-auto px-4 md:px-8">

        <div class="items-start justify-between md:flex">
            <div class="max-w-lg">
                <h3 class="text-gray-800 text-xl font-bold sm:text-2xl">All collections</h3>
            </div>
            <div class="mt-3 md:mt-0">
                <a href="{{ URL::tokenRoute('collections.create') }}" class="inline-block px-4 py-2 text-white duration-150 font-medium bg-indigo-600 rounded-lg hover:bg-indigo-500 active:bg-indigo-700 md:text-sm">Create Collection</a>
            </div>
        </div>
        <div class="mt-12 relative h-max overflow-auto">
            <table class="w-full table-auto text-sm text-left">
                <thead class="text-gray-600 font-medium border-b">
                    <tr>
                        <th class="py-3 pr-6">Name</th>
                        <th class="py-3 pr-6">Description</th>
                        <th class="py-3 pr-6 text-center">Actions</th>
                    </tr>
                </thead>
                <tbody class="text-gray-600 divide-y">
                    @foreach ($collections as $item)
                        <tr>
                            <td class="pr-6 py-4 whitespace-nowrap">{{ $item->name }}</td>
                            <td class="pr-6 py-4 whitespace-nowrap">{{ $item->description }}</td>
                            <td class="text-right whitespace-nowrap">
                                <a href="{{ URL::tokenRoute('collections.edit', ['collection' => $item->id]) }}" class="px-4 py-2 text-indigo-600 bg-indigo-100 rounded-lg duration-150 hover:bg-indigo-200 active:bg-indigo-300">Edit</a>

                                <a href="{{ URL::tokenRoute('collections.products.list', ['collection' => $item->id]) }}" class="px-4 py-2 text-indigo-600 bg-indigo-100 rounded-lg duration-150 hover:bg-indigo-200 active:bg-indigo-300">Product List</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

