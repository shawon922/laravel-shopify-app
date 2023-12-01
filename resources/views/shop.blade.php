@extends('layouts.master')

@section('content')
    <div class="max-w-md mx-auto mt-12 h-40 rounded-lg border-2 border-dashed flex items-center justify-center bg-white">
        <div class="items-start justify-between py-4 border-b md:flex">
            <div class="max-w-lg">
                <h3 class="text-gray-800 text-2xl font-bold">
                    Shop ID: {{ Auth::user()->id }}
                </h3>
                <h3 class="text-gray-800 text-2xl font-bold">
                    Shop name: {{ explode('.', Auth::user()->name)[0] }}
                </h3>
            </div>
        </div>
    </div>

@endsection

@section('scripts')
    @parent

    <script>
        actions.TitleBar.create(app, { title: 'Shop' });
    </script>
@endsection
