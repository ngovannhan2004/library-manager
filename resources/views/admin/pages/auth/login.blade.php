<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <style>
        * {
            margin: 0;
            padding: 0;
            font-family: 'poppins', sans-serif;
        }
        section{
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            width: 100%;
            background: url("{{asset('/admin/assets/css/login.jpg')}}")  no-repeat;
            background-position: center;
            background-size: cover;
        }
        .form-box{

            position: relative;
            width: 400px;
            height: 450px;
            background: transparent;
            border: 2px solid rgba(255,255,255,0.5);
            border-radius: 20px;
            backdrop-filter: blur(15px);
            display: flex;
            justify-content: center;
            align-items: center;

        }
        h2{
            font-size: 2em;
            color: #fff;
            text-align: center;
        }
        .inputbox{
            position: relative;
            margin: 30px 0;
            width: 310px;
            border-bottom: 2px solid #fff;
        }
        .inputbox label{
            position: absolute;
            top: 50%;
            left: 5px;
            transform: translateY(-50%);
            color: #fff;
            font-size: 1em;
            pointer-events: none;
            transition: .5s;
        }
        input:focus ~ label,
        input:valid ~ label{
            top: -5px;
            font-size: 0.8rem;
        }
        .inputbox input{
            width: 90%;
            height: 50px;
            background: transparent;
            border: none;
            outline: none;
            font-size: 1em;
            padding: 0 35px 0 5px;
            color: #fff;
            border-bottom: 2px solid #fff;
        }
        .inputbox ion-icon{
            position: absolute;
            right: 8px;
            color: #fff;
            font-size: 1.2em;
            top: 20px;
        }
        .forget{
            margin: -15px 0 15px;
            font-size: .9em;
            color: #fff;
            display: flex;
            justify-content: space-between;

        }
        .forget label input{
            margin-right: 3px;
        }
        .forget label a{
            color: #fff;
            text-decoration: none;
        }
        .forget label a:hover{
            text-decoration: underline;
        }
        button {
            width: 100%;
            height: 40px;
            border-radius: 40px;
            background: #fff;
            border: none;
            outline: none;
            cursor: pointer;
            font-size: 1em;
            font-weight: 600;
        }
        .register{
            font-size: .9em;
            color: #fff;
            text-align: center;
            margin: 25px 0 10px;
        }
        .register p a{
            text-decoration: none;
            color: #fff;
            font-weight: 600;
        }
        .register p a:hover{
            text-decoration: underline;
        }

    </style>
</head>
<body>
<section>
    <div class="form-box">
        <div class="form-value">
            <form action="{{route('admin.auth.login-post')}}" method="post">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <h2>Login</h2>
                @csrf
                <div class="inputbox">
                    <ion-icon name="mail-outline"></ion-icon>
                    <input type="email" name="email" required>
                    <label for=" ">Email</label>
                    @error('name')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="inputbox">
                    <ion-icon name="lock-closed-outline"></ion-icon>
                    <input type="password" name="password" required>
                    <label for=" ">Password</label>
                    @error('name')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="forget">
                    <label>
                        <input type="checkbox">
                        <span>Remember me</span>
                    </label>
                    <a href="#">Forgot password?</a>
                </div>
                <button type="submit" name="submit" value="submit">Login</button>
                <div class="register">
                    <p>Don't have an account?
                        <a href="{{route('admin.auth.register')}}">Register</a>
                    </p>
                </div>
            </form>
        </div>
    </div>
</section>
<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>
</html>
