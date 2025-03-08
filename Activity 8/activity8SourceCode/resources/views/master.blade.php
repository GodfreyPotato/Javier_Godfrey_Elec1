<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <div style="display:flex; flex-direction: column; align-items:center; justify-content:center;  height:70vh;">

        <div style="">
            <h1>Ordering System</h1>
            <nav>

                <a href="/customer">Customer</a></li>
                <a href="/item">Item</a></li>
                <a href="/order">Order</a></li>
                <a href="/orderdetails">Order Details</a></li>

            </nav>
        </div>
        <br><br>

        @yield('content')
    </div>
</body>

</html>