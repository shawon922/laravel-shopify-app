@extends('layouts.master')

@section('content')
    <div class="max-w-screen-xl mx-auto px-4 md:px-8">
        <div class="mt-8 max-w-lg space-y-3">
            <h3 class="text-indigo-600 font-semibold">
                Edit Product
            </h3>
        </div>

        <div class="mt-8 max-w-lg">
            
            <form action="{{ route('collections.products.update', ['collection' => $collection->id, 'product' => $product->id]) }}" method="post">
                @method('PUT')
                @sessionToken

                <div class="flex flex-col items-center gap-y-5 gap-x-12 [&>*]:w-full sm:flex-row">
                    <div class="w-full">
                        <label class="font-medium">
                            Name
                        </label>
                        <input
                            required
                            type="text" 
                            name="name" 
                            id="name" 
                            placeholder="Enter name"
                            value="{{ $product->name }}"
                            class="w-full mt-2 px-3 py-2 text-gray-500 border focus:border-indigo-600 shadow-sm rounded-lg"
                        />
                    </div>
                </div>
                <div class="flex flex-col items-center gap-y-5 gap-x-12 [&>*]:w-full sm:flex-row">
                    <div class="w-full">
                        <label class="font-medium">
                            Description
                        </label>
                       
                        <textarea name="description" id="description" placeholder="Enter description" class="w-full mt-2 h-36 px-3 py-2 resize-none appearance-none border focus:border-indigo-600 shadow-sm rounded-lg">{{ $product->description }}</textarea>
                    </div>
                </div>
                <button class="px-4 py-2 text-white font-medium bg-indigo-600 hover:bg-indigo-500 active:bg-indigo-600 rounded-lg duration-150">
                    Submit
                </button>
            </form>
        </div>
    </div>
    
@endsection

