<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <form class="input-group mb-3" method="POST" action="{{ route("dashboard.store") }}" id="add-task">
        @csrf
        <div class="container">
            <div class="row">
                <div class="col-md-2">
                    <x-text-input id="title" class="form-control"
                                  name="title"
                                  placeholder="Title"
                                  required/>
                </div>
                <div class="col-md-10">
                    <x-text-input id="title" class="form-control"
                                  name="tags_string"
                                  placeholder="Tags"
                                  required/>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <x-textarea-input placeholder="Text"
                                      id="text"
                                      class="form-control"
                                      name="text"/>
                </div>
            </div>
            <div class="row">
                <div class="col-md-2">
                    <x-primary-button class="btn btn-secondary btn-md active d-block ">
                        Add Task
                    </x-primary-button>
                </div>
            </div>
        </div>
    </form>
    <div  class="mt-3" id="tasks-container">
        <form class="input-group mb-3 task-form" method="POST" action='{{ route("dashboard.update", '') }}' id="new-task" hidden>
            @csrf
            <input type="hidden" name="_method" value="PUT">
            <div class="container">
                <div class="row">
                    <div class="col-md-2">
                        <x-text-input id="title" class="form-control"
                                      name="title"
                                      value=""
                                      required/>
                    </div>

                    <div class="col-md-8">
                        <x-text-input id="tags" class="form-control"
                                      name="tags_string"
                                      value=""
                                      required/>
                    </div>
                    <div class="col-md-1">
                        <x-primary-button class="btn btn-warning btn-md active d-block" type="submit">
                            Save
                        </x-primary-button>
                    </div>
                    <div class="col-md-1">
                        <x-primary-button class="btn btn-danger btn-md active d-block" id="deleteButton" type="button" onclick="deleteTask($(this).closest('form'))">
                            X
                        </x-primary-button>
                    </div>

                </div>
                <div class="row">
                    <div class="col-md-12">
                        <x-textarea-input id="text"
                                          class="form-control"
                                          name="text">

                        </x-textarea-input>
                    </div>
                </div>
            </div>
        </form>
        @foreach($tasks as $task)
            <hr>
            <form class="input-group mb-3 task-form" method="POST" action='{{ route("dashboard.update", $task->id) }}' id="{{ $task->id }}">
                @csrf
                <input type="hidden" name="_method" value="PUT">
                <div class="container">
                    <div class="row">
                        <div class="col-md-2">
                            <x-text-input id="title" class="form-control"
                                          name="title"
                                          value="{{ $task->title }}"
                                          required/>
                        </div>

                        <div class="col-md-8">
                            <x-text-input id="tags" class="form-control"
                                          name="tags_string"
                                          value="{{ implode(' ', array_column($task->tags()->get()->toArray(), 'title')) }}"
                                          required/>
                        </div>
                        <div class="col-md-1">
                            <x-primary-button class="btn btn-warning btn-md active d-block" type="submit">
                                Save
                            </x-primary-button>
                        </div>
                        <div class="col-md-1">
                            <x-primary-button class="btn btn-danger btn-md active d-block" type="button" id="deleteButton" onclick="deleteTask($(this).closest('form'))">
                                X
                            </x-primary-button>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <x-textarea-input id="text"
                                              class="form-control"
                                              name="text">
                                {{ $task->text }}
                            </x-textarea-input>
                        </div>
                    </div>
                </div>
            </form>
        @endforeach
    </div>
</x-app-layout>
