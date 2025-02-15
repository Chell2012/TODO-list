import './bootstrap';
import 'bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

$(document).ready(function() {
    $(".task-form").submit(function(event) {
        event.preventDefault();

        let url = $(this).attr("action");
        let method = "PUT";
        let formData = $(this).serialize();

        $.ajax({
            url: url,
            type: method,
            data: formData,
            dataType: "json",
            success: function(response) {
                updateTask(response)
            },
            error: function(xhr, status, error) {
                console.error("Error:", error);
            }
        });
        return false;
    });
    $("#add-task").submit(function(event) {
        event.preventDefault();

        let url = $(this).attr("action");
        let method = "POST";
        let formData = $(this).serialize();

        $.ajax({
            url: url,
            type: method,
            data: formData,
            dataType: "json",
            success: function(response) {
                addTask(response);
            },
            error: function(xhr, status, error) {
                console.error("Error:", error);
            }
        });
        return false;
    });
    function addTask(data){
        let clone = $("#new-task").clone(true);
        clone.removeAttr("hidden");
        clone.attr("action", clone.attr('action')+'/'+data['id']);
        clone.find("#title").val(data['title']);
        clone.find("#tags").val(data['tags'].flat().map(item => item.title).join(' '));
        clone.find("#text").val(data['text']);
        $("#tasks-container").append('<hr>');
        $("#tasks-container").append(clone);
    }
    function updateTask (data){
        let element = $("#new-task");
        element.find("#title").val(data['title']);
        element.find("#tags").val(data['tags'].flat().map(item => item.title).join(' '));
        element.find("#text").val(data['text']);
    }
    window.deleteTask = function (element){
        let method = "DELETE";
        let url = element.attr('action');
        let formData = {
            "_token":element.find('[name="_token"]').attr("value"),
        }
        $.ajax({
            url: url,
            type: method,
            data: formData,
            dataType: "json",
            success: function(response) {
                if (response == true)
                    element.remove();
            },
            error: function(xhr, status, error) {
                console.error("Error:", error);
            }
        });
    }
});


