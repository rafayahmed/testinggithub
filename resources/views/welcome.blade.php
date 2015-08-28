
<!DOCTYPE html>
<html>
    <head>
        <title>Laravel</title>

        <link href="//fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">

        <style>
            html, body {
                height: 100%;
            }

            body {
                background-color: #a1bad1;
                margin: 0;
                padding: 0;
                width: 100%;
                display: table;
                font-weight: 100;
                font-family: 'Lato';
            }

            .container {
                text-align: center;
                display: table-cell;
                vertical-align: middle;
            }

            .content {
                text-align: center;
                display: inline-block;
            }

            .title {
                font-size: 20px;
                color: red;

            }
        </style>
    </head>
    <body>
        <div class="container">
            <div class="content">
                <div class="title"><b>Hello {{ $user->first_name }} <b> </div>
            </div>
             <p><strong><a href="{{ URL::to('logout') }}">Logout</a></strong></p>
        </div>

    </body>
</html>
