<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <form class="input-group mb-3" method="POST" action="{{ route("dashboard.store") }}">
        <div class="container">
            <div class="row">
                <div class="col-md-2">
                    <x-text-input id="title" class="form-control"
                                  name="title"
                                  required/>
                </div>
                <div class="col-md-10">
                    <x-tags-input />
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <x-textarea-input id="text" class="form-control"
                                  name="text"/>
                </div>
            </div>
        </div>
    </form>

    @foreach($tasks as $task)
        <form class="input-group mb-3" method="PUT" action="{{ route("dashboard.update", $task->id) }}">
            <div class="container">
                <div class="row">
                    <div class="col-md-10">
                        <x-text-input id="title" class="form-control"
                                      name="title"
                                      required/>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <x-text-input id="text" class="form-control"
                                      name="text"
                                      required/>
                    </div>
                </div>
            </div>
        </form>
    @endforeach

</x-app-layout>
