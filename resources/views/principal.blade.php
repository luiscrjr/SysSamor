<html>
    <head>
        <link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
        <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
        <style type="text/css">

            
            .div-decorator
    {
        border-top:3px solid #428BCA;
        border-right:3px solid #D9534F;
        border-bottom:3px solid #5CB85C;
        border-left:3px solid #F0AD4E;
        margin:30px;
        border-radius:20px;
    }
    .div-heading
    {
        border-bottom:1px dashed #5BC0DE;
        padding-top:15px;
        padding-bottom:15px;
        margin:0px;
        background-color:#F5F5F5;
        border-radius:20px 20px 0px 0px;
    }
    .heading
    {
        color:#5FC9E5;
    }
    .div-content
    {
        padding:30px
    }
    .btn-circle
    {
        width: 30px;
        height: 30px;
        text-align: center;
        padding: 6px 0;
        font-size: 12px;
        line-height: 1.428571429;
        border-radius: 15px;
    }
    .btn-circle.btn-lg
    {
        width: 50px;
        height: 50px;
        padding: 10px 16px;
        font-size: 18px;
        line-height: 1.33;
        border-radius: 25px;
    }
    .btn-circle.btn-xl
    {
        width: 70px;
        height: 70px;
        padding: 10px 16px;
        font-size: 24px;
        line-height: 1.33;
        border-radius: 35px;
    }

            /* Estilo RadioButton */

            /* Estilo iOS */
            /* Estilo iOS */
            .switch__container {
            margin: 30px auto;
            width: 60px;
            }

            .switch {
            visibility: hidden;
            position: absolute;
            margin-left: -9999px;
            }

            .switch + label {
            display: block;
            position: relative;
            cursor: pointer;
            outline: none;
            user-select: none;
            }

            .switch--shadow + label {
            padding: 2px;
            width: 60px;
            height: 30px;
            background-color: #dddddd;
            border-radius: 30px;
            }
            .switch--shadow + label:before,
            .switch--shadow + label:after {
            display: block;
            position: absolute;
            top: 1px;
            left: 1px;
            bottom: 1px;
            content: "";
            }
            .switch--shadow + label:before {
            right: 1px;
            background-color: #f1f1f1;
            border-radius: 30px;
            transition: background 0.4s;
            }
            .switch--shadow + label:after {
            width: 31px;
            background-color: #fff;
            border-radius: 100%;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.3);
            transition: all 0.4s;
            }
            .switch--shadow:checked + label:before {
            background-color: #8ce196;
            }
            .switch--shadow:checked + label:after {
            transform: translateX(30px);
            }
    </style>
    </head>
    <body style="background-color:#eaeaea">
        <div class="container">

        @yield('conteudo')

        </div>
    </body>
</html>