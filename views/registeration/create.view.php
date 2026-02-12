<head>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<div class=" flex flex-col justify-around items-center p-2 w-screen h-screen bg-cover" style="background-image: url('/GiftCards/public/img/bgLogin.svg');"> 
        
<form id="registerForm" method="post" action="/GiftCards/public/index.php/register" class=" w-full  p-5 sm:p-10 bg-[#292929] sm:w-[440px] rounded-xl" style="box-shadow: 0 0 2px rgba(0,0,0,0.24), 0 8px 16px rgba(0,0,0,0.28);"   action="">
            <div class="flex flex-col items-center justify-center gap-2 text-white  w-full    ">
                <a href="/VibeMart/"><img class="w-24" src="./img/xbox_logo_white_cde084563e169a9848af.svg" alt=""></a>
                <div class="w-full flex flex-col gap-5">
                    <h1 class="text-lg font-semibold text-center">Create your Vibemart account</h1>
                    <input type="text" class="w-full  bg-transparent border-[1px] border-gray-400 py-3 px-5 text-xs rounded-md " placeholder="name" name="name" id="">
                    <input type="email" class="w-full bg-transparent border-[1px] border-gray-400 py-3 px-5 text-xs rounded-md " placeholder="Email" name="email" id="">
                    <input type="password" class="w-full bg-transparent border-[1px] border-gray-400 py-3 px-5 text-xs rounded-md " placeholder="password" name="password" id="">
                    <div class="flex gap-5">
                <button type="submit" name="register" class="bg-[#008746] text-white w-full py-3 text-xs rounded-lg">Register</button>

                </div>
                    <p class="text-center text-sm font-thin">Already have an account? <a id="loginBtn" href="/GiftCards/public/index.php/login" class=" cursor-pointer text-[#008746]">Sign in</a></p>

                </div>
        </form>

</div>
        <div class="text-white text-xs flex flex-col items-center gap-5 text-center">
             <p class="font-bold text-lg">VibeMart</p>
            <p>See also: New Games Coming Out XBOX Gaming Pass</p>
            <p>© 2026 Vibemart</p>
        </div>
</div>

        

    

        
