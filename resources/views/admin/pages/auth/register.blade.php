<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <style>
        * {
            margin: 0;
            padding: 0;
            font-family: 'poppins', sans-serif;
        }
        section {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            width: 100%;
            background: url("{{asset('/admin/assets/css/login.jpg')}}") no-repeat;
            background-position: center;
            background-size: cover;
        }
        .form-box {
            position: relative;
            width: 400px;
            height: auto; /* Đã thay đổi chiều cao để có thể thay đổi kích thước theo nội dung */
            background: transparent;
            border: 2px solid rgba(255, 255, 255, 0.5);
            border-radius: 20px;
            backdrop-filter: blur(15px);
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column; /* Thêm để căn giữa dọc */
        }
        h2 {
            font-size: 2em;
            color: #fff;
            text-align: center;
        }
        .inputbox {
            position: relative;
            margin: 15px 0; /* Đã thay đổi khoảng cách giữa các trường nhập liệu */
            width: 310px;
            border-bottom: 2px solid #fff;
        }
        .inputbox label {
            position: absolute;
            top: 50%;
            left: 5px;
            transform: translateY(-50%);
            color: #fff;
            font-size: 1em;
            pointer-events: none;
            transition: .5s;
        }
        input:focus ~ label, input:valid ~ label {
            top: -5px;
            font-size: 0.8rem;
        }
        .inputbox input {
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
        .inputbox ion-icon {
            position: absolute;
            right: 8px;
            color: #fff;
            font-size: 1.2em;
            top: 20px;
        }
        .forget {
            margin: -15px 0 15px;
            font-size: .9em;
            color: #fff;
            display: flex;
            justify-content: space-between;
        }
        .forget label input {
            margin-right: 3px;
        }
        .forget label a {
            color: #fff;
            text-decoration: none;
        }
        .forget label a:hover {
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
        .register {
            font-size: .9em;
            color: #fff;
            text-align: center;
            margin: 25px 0 10px;
        }
        .register p a {
            text-decoration: none;
            color: #fff;
            font-weight: 600;
        }
        .register p a:hover {
            text-decoration: underline;
        }
        .select-style select {
            width: 100%;
            height: 50px;
            background: transparent;
            border: none;
            outline: none;
            font-size: 1em;
            color: #fff;
            border-bottom: 2px solid #fff;
            appearance: none; /* Ẩn mũi tên xuống trình duyệt */
            -webkit-appearance: none; /* Tương tự cho trình duyệt Chrome/Safari */
        }

    </style>
</head>
<body>
<section>
    <div class="form-box">
        <div class="form-value">
            <form action="{{ route('admin.auth.register-post') }}" method="post">
                <h2>Register</h2>
                @csrf
                <div class="inputbox">
                    <ion-icon name="person-outline"></ion-icon>
                    <input type="text" name="name" required placeholder="Nhập tên">
                    <label for="name">Tên</label>
                </div>
                <div class="inputbox">
                    <ion-icon name="mail-outline"></ion-icon>
                    <input type="email" name="email" required placeholder="Nhập email">
                    <label for="email">Email</label>
                </div>
                <div class="inputbox">
                    <ion-icon name="lock-closed-outline"></ion-icon>
                    <input type="password" name="password" required placeholder="Nhập password">
                    <label for="password">Password</label>
                </div>
                <div class="inputbox">
                    <ion-icon name="calendar-outline"></ion-icon>
                    <input type="text" name="namsinh" required placeholder="Nhập năm sinh">
                    <label for="namsinh">Năm Sinh</label>
                </div>
                <div class="inputbox">
                    <ion-icon name="call-outline"></ion-icon>
                    <input type="text" name="sdt" required placeholder="Nhâp sdt">
                    <label for="sdt">sdt</label>
                </div>
                <div class="inputbox">
                    <ion-icon name="briefcase-outline"></ion-icon>
                    <input type="text" name="role" required placeholder=" Nhập role">
                    <label for="role">role</label>
                </div>
                <div class="inputbox">
                    <ion-icon name="male-female-outline"></ion-icon>
                    <div class="select-style">
                        <select name="GioiTinh" required>
                            <option value="Nam">Nam</option>
                            <option value="Nữ">Nữ</option>
                            <option value="Khác">Khác</option>
                        </select>
                    </div>
                </div>


                <div class="forget">
                    <label>
                        <input type="checkbox">
                        <span>Remember me</span>
                    </label>
                    <a href="#">Forgot password?</a>
                </div>
                <button type="submit">Register</button>
                <div class="register">
                    <p>Already have an account?
                        <a href="{{ route('admin.auth.login') }}">Login</a>
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
