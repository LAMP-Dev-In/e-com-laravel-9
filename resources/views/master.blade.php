<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ecomm Project</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

    <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
    
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>

</head>
<body>
    {{View::make('header')}}
    @yield('content')
    {{View::make('footer')}}
</body>
    <style>
        .custom-login{
            height: 520px;
            padding-top: 100px;
        }
        img.slider-img{
            height: 400px !important;
        }
        .custom-product{
            height: 600px;
        }
        .slider-text{
            background-color: #353e368c !important;
        }
        .tranding-image{
            height: 100px;
        }
        .tranding-item{
            float: left;
            width: 16%;
        }
        .tranding-wrapper{
            margin: 30px;
        }
        .detail-img{
            height: 200px;
        }
        .cart-list-divider{
            border-bottom: 1px solid #ccc;
            margin-bottom: 20px;
            padding-bottom: 20px;
        }
        .ordernow{
            padding: 40px;
        }
    </style>
</html>