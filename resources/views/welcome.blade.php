@extends('layouts.master')

@section('content')

    <div class="max-w-screen-xl mx-auto px-4 md:px-8">
        <div class="items-start justify-between py-4 border-b md:flex">
            <div class="max-w-lg">
                <h3 class="text-gray-800 text-2xl font-bold">
                    Your shop ID: {{ Auth::user()->id }}
                </h3>
                <h3 class="text-gray-800 text-2xl font-bold">
                    Your shop name: {{ explode('.', Auth::user()->name)[0] }}
                </h3>
            </div>
        </div>
    </div>

@endsection

@section('scripts')
    @parent

    <script>
        actions.TitleBar.create(app, { title: 'Home' });
    </script>
@endsection
