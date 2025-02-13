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
                    <div class="tag-container" id="tagContainer" >
                        <input type="text" class="tag-input form-control" id="tagInput" placeholder="New tag">
                        <button class="btn btn-secondary btn-sm active" onclick="addTag(this, this.parent.getElementById('tagInput'))">Add</button>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <x-textarea-input id="text" class="form-control" name="text"/>
                </div>
            </div>
        </div>
    </form>

    @foreach($tasks as $task)
        <form class="input-group mb-3" method="PUT" action="{{ route("dashboard.update", $task->id) }}">
            <div class="container">
                <div class="row">
                    <div class="col-md-2">
                        <x-text-input id="title" class="form-control"
                                      name="title"
                                      value="{{ $task->title }}"
                                      required/>
                    </div>
                    <div class="col-md-10">
                        <div class="tag-container" id="tagContainer" >
                            <input type="text" class="tag-input form-control" id="tagInput" placeholder="New tag">
                            @foreach($task->tags()->get() as $tag)
                                <div class="tag">
                                    {{ $tag['title'] }}
                                    <button onclick="this.parentElement.remove()">×</button>
                                    <input name="tag[]" type="hidden" value="{{ $tag['title'] }}">
                                </div>
                            @endforeach
                            <button class="btn btn-secondary btn-sm active" type="button" onclick="addTag(this, this.parent.getElementById('tagInput'))">Add</button>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <x-textarea-input id="text" class="form-control" name="text">
                            {{ $task->text }}
                        </x-textarea-input>
                    </div>
                </div>
            </div>
        </form>
    @endforeach

</x-app-layout>
