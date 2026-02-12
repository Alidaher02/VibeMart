<head>
    <script src="https://cdn.tailwindcss.com"></script>
</head>


<div class=" flex flex-col justify-around items-center h-screen p-2" style="background-image: url('/GiftCards/public/img/bgLogin.svg');"> 

<form id="loginForm" method="post" action="/GiftCards/public/index.php/login" class="p-5 sm:p-10 bg-[#292929] w-full sm:w-[440px] rounded-xl" style="box-shadow: 0 0 2px rgba(0,0,0,0.24), 0 8px 16px rgba(0,0,0,0.28);">
            <div class="flex flex-col items-center justify-center gap-2 text-white  w-full    ">
                <div class="w-full flex flex-col gap-5">
                    <h1 class="text-lg font-semibold text-center">Login in</h1>
                    <input type="text" class="w-full bg-transparent border-[1px] border-gray-400 py-3 px-5 text-xs rounded-md " placeholder="Email" name="email" id="">
                    <input type="password" class="w-full bg-transparent border-[1px] border-gray-400 py-3 px-5 text-xs rounded-md " placeholder="password" name="password" id="">
                    <button type="submit" class="bg-[#008746] text-white w-full py-3 text-xs rounded-lg">Login</button>
                    <p class="text-center text-sm font-thin">Don't have an account yet? <a id="registerBtn" href="/GiftCards/public/index.php/register" class="text-[#008746] cursor-pointer">Register</a></p>
                </div>
                </div>
                <p class=" text-red-600 text-xs mt-2"><?= $errors['email'] ?? null ?></p>
                <p class=" text-red-600 text-xs mt-2"><?= $errors['password'] ?? null ?></p>




        </form>

        <div class="text-white text-xs flex flex-col items-center gap-5 text-center">
             <p class="font-bold text-lg">VibeMart</p>
            <p>See also: New Games Coming Out XBOX Gaming Pass</p>
            <p>© 2026 Vibemart</p>
        </div>

</div>