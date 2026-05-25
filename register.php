<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Register</title>

<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">

<style>

*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family:'Poppins',sans-serif;
}

body{
    height:100vh;
    display:flex;
    justify-content:center;
    align-items:center;
    background:linear-gradient(135deg,#4f46e5,#7c3aed,#06b6d4);
    overflow:hidden;
}

.box{
    width:370px;
    background:rgba(255,255,255,0.12);
    border:1px solid rgba(255,255,255,0.2);
    backdrop-filter:blur(12px);
    padding:35px;
    border-radius:20px;
    box-shadow:0 8px 32px rgba(0,0,0,0.25);
    color:white;
    animation:muncul 0.8s ease;
}

@keyframes muncul{
    from{
        opacity:0;
        transform:translateY(20px);
    }

    to{
        opacity:1;
        transform:translateY(0);
    }
}

h2{
    text-align:center;
    margin-bottom:25px;
    font-size:30px;
}

.input-box{
    margin-bottom:18px;
}

.input-box label{
    display:block;
    margin-bottom:8px;
    font-size:14px;
}

.input-box input{
    width:100%;
    padding:12px;
    border:none;
    outline:none;
    border-radius:10px;
    background:rgba(255,255,255,0.2);
    color:white;
}

.input-box input::placeholder{
    color:rgba(255,255,255,0.7);
}

button{
    width:100%;
    padding:12px;
    border:none;
    border-radius:10px;
    background:white;
    color:#4f46e5;
    font-size:16px;
    font-weight:600;
    cursor:pointer;
    transition:0.3s;
}

button:hover{
    transform:scale(1.03);
    background:#f3f4f6;
}

.login-link{
    text-align:center;
    margin-top:15px;
}

.login-link a{
    color:white;
    text-decoration:none;
    font-weight:bold;
}

</style>
</head>
<body>

<div class="box">

<h2>REGISTER</h2>

<form method="POST" action="proses_register.php">

<div class="input-box">
<label>Username</label>
<input type="text" name="username" placeholder="Masukkan Username" required>
</div>

<div class="input-box">
<label>Password</label>
<input type="password" name="password" placeholder="Masukkan Password" required>
</div>

<button type="submit">
Daftar
</button>

</form>

<div class="login-link">
Sudah punya akun?
<a href="login.php">Login</a>
</div>

</div>

</body>
</html>