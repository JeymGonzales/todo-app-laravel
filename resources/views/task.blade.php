<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">


        <!-- Styles -->
        
        <style>
            body{
                margin-top:20px;
                background: #f8f8f8;
            }

            .todo-nav {
                margin-top: 10px
            }

            .todo-list {
                margin: 10px 0
            }

            .todo-list .todo-item {
                padding: 15px;
                margin: 5px 0;
                border-radius: 0;
                background: #f7f7f7; 
                transition: all ease 300ms;
            }

            .todo-list.only-active .todo-item.complete {
                display: none
            }

            .todo-list.only-active .todo-item:not(.complete) {
                display: block
            }

            .todo-list.only-complete .todo-item:not(.complete) {
                display: none
            }

            .todo-list.only-complete .todo-item.complete {
                display: block
            }

            .todo-list .todo-item.complete span {
                text-decoration: line-through
            }

            .remove-todo-item {
                color: #ccc;

            }

            .remove-todo-item:hover {
                color: #5f5f5f
            }

            .todo-item:hover .remove-todo-item {
                visibility: visible
            }

            div.checker {
                width: 18px;
                height: 18px
            }

            div.checker input,
            div.checker span {
                width: 18px;
                height: 18px
            }

            div.checker span {
                display: -moz-inline-box;
                display: inline-block;
                zoom: 1;
                text-align: center;
                background-position: 0 -260px;
            }

            div.checker, div.checker input, div.checker span {
                width: 19px;
                height: 19px;
            }

            div.checker, div.radio, div.uploader {
                position: relative;
            }

            div.button, div.button *, div.checker, div.checker *, div.radio, div.radio *, div.selector, div.selector *, div.uploader, div.uploader * {
                margin: 0;
                padding: 0;
            }

            div.button, div.checker, div.radio, div.selector, div.uploader {
                display: -moz-inline-box;
                display: inline-block;
                zoom: 1;
                vertical-align: middle;
            }

            .card {
                padding: 25px;
                margin-bottom: 20px;
                border: initial;
                background: #fff;
                border-radius: calc(.15rem - 1px);
                box-shadow: 0 1px 15px rgba(0,0,0,0.04), 0 1px 6px rgba(0,0,0,0.04);
            }

            .todo-item.inactive {
                background:#f50624;
            }

            button[type="submit"] {
                margin-top: 16px;
            }


        </style>
    </head>
    <body>
        <div class="content" id="app">
            <todo items="{{ $items }}"></todo>
        </div>
    </body>
    <script src="{{ mix('js/app.js') }}"></script>
</html>