  <?php
  function isUrl($value)
  {
      return $_SERVER['REQUEST_URI'] === $value;
  }


  ?>
  <!DOCTYPE html>
  <html lang="en">
  <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@12/swiper-bundle.min.css" />
      <script src="https://cdn.jsdelivr.net/npm/swiper@12/swiper-bundle.min.js"></script>
      <script src="https://cdn.tailwindcss.com"></script>
      <!-- Font Awesome CDN -->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"/>
      <title>VibeMart</title>
  </head>
  <body class="bg-[#0e0e0e] relative">

    <header class=" bg-black text-white md:px-24 py-6 flex lg:flex-row flex-col gap-4 items-center justify-between" >
    <div class="flex lg:flex-row flex-col items-center gap-5 lg:gap-10">
      <div class="flex items-center gap-5 text-lg">
          <div class="flex items-center gap-2">
          <i class="fa-solid fa-gun"></i>
          <p class="text-white text-lg font-semibold border-r-[2px] border-r-gray-600 pr-5 py-1">Vibemart</p>
          </div>
          
          <p class="text-white">Store</p>
        </div>
        <nav class="flex items-center gap-5">
          <a class="<?= isUrl('/GiftCards/public') ? 'text-blue-700 font-semibold border-b-blue-700 border-b-[2px] py-1' :'text-white'; ?>  text-sm" href="/GiftCards/public">Home</a>
          <a class="<?= isUrl('/apps') ? 'text-blue-700 font-semibold border-b-blue-700 border-b-[2px] py-1' :'text-white'; ?> text-sm" href="/apps">Apps</a>
          <a class="<?= isUrl('/games') ? 'text-blue-700 font-semibold border-b-blue-700 border-b-[2px] py-1' :'text-white'; ?>text-sm" href="/games">Games</a>
          <a class="<?= isUrl('/about') ? 'text-blue-700 font-semibold border-b-blue-700 border-b-[2px] py-1' :'text-white'; ?> text-sm" href="/about">About</a>

        </nav>
    </div>
    <div class="md:w-[60%] flex items-center gap-5 px-1">
      <div class="relative w-full">   
          <div class="relative">
          <input id="inputSearch" class=" w-full rounded-full h-8 bg-[#1a1b1e]  placeholder-white px-8 text-sm" placeholder="Search apps, games, and more" type="search">
          <div id="searchSection" class="overflow-auto space-y-6 hidden bg-black absolute w-full h-fit max-h-[380px] p-5 z-10">
                          
                          </div>
          </div>

          <div class="absolute top-0 left-0 px-2 py-1">
              <i class="fa-solid fa-magnifying-glass text-sm"></i>
          </div>
      </div>
        <div class="flex items-center gap-3">
        <?php if ($_SESSION['user'] ?? false) : ?>
          <div class ="relative flex items-center gap-3 text-lg">
          <img id="pfBtn" class="w-10 cursor-pointer" src="/GiftCards/public/img/pf2.png" alt="">
          <div id="logoutMenu" class=" hidden  absolute p-5 text-xs rounded-lg z-10    top-10 bg-gray-100 w-52 -left-24 ">
                      <div class="flex flex-col gap-5 text-black">
                      <div class="flex flex-col gap-2 text-black ">
                      <p>name: <?= $_SESSION['user']['name'] ?></p>
                      <p>email: <?= $_SESSION['user']['email'] ?></p>
                      <form action="/GiftCards/public/index.php/logout">
                      <button type="submit" class="px-10 py-2 w-fit text-white bg-[#ce2a4a] rounded-lg">logout</button>
                      </form>
                      </div>
                      </div>
          
            
  
        <?php else: ?>
          <a class="text-xs w-24  font-semibold flex items-center gap-2 hover:font-bold" href="/GiftCards/public/index.php/login">Sign in <span><i class="fa-solid fa-circle-user text-gray-300 text-2xl"></i>   </span></a>
        <?php endif; ?>
        </div>
        <div class="relative">
        <button id="cartBtn"><i class="fa-solid fa-cart-shopping text-white text-lg"></i></button>
        <div class="absolute -top-1 -right-2">
        <p class="text-xs text-white"><?= $count['count'] ?></p>
        </div>
        </div>

        
    </div>

    <section class="hidden bg-black shadow-2xl h-screen w-[400px] fixed top-0 right-0 z-50 px-5" id="cartSection">
<div class="flex items-center w-full justify-between border-b-[1px] border-gray-300 py-3">
<div class="flex items-center gap-2">
<i class="fa-solid fa-bag-shopping text-blue-600 text-2xl"></i>
<p class="text-xl font-semibold">Cart</p>
</div>
<i id="closeCart" class="fa-close fa-solid text-xl cursor-pointer hover:text-red-600 duration-500 transition-all"></i>
</div>
<div id="cartItems" class="flex flex-col gap-5 py-10 px-5 overflow-y-auto h-[70vh]  w-full ">
           

</div>
<div class="flex flex-col w-full">
<div id="cartTot" class="flex items-center justify-between font-semibold px-5 py-5">
 
</div>
<div class="px-5 flex flex-col text-sm gap-2">
  <div class="flex items-center justify-between p-2">
    <p>Total price:</p>
  <p class=" text-white"><?= $totalPrice['total_price'] ?> $</p>
  </div>
<button id="checkOut" class="bg-white text-black px-10 py-3 uppercase font-mono w-full hover:bg-black/80">CheckOut</button>
</div>
</div>
</section>

    </header>

    <script>

const closeCart = document.getElementById("closeCart");
        const cartSection = document.getElementById("cartSection");
        const cartBtn = document.getElementById("cartBtn");
        cartBtn.addEventListener("click" , ()=>{
          cartSection.classList.remove("hidden");
        })
        closeCart.addEventListener("click" , ()=>{
          cartSection.classList.add("hidden");
        })

        const cartTot = document.getElementById("cartTot");
const cartItems = document.getElementById("cartItems");

async function fetchData() {
  try {
    const response = await fetch("/GiftCards/api/addToCart.php");

    if (!response.ok) throw new Error("Network response failed");

    const data = await response.json();

    console.log(data); // 👈 very important for debugging

    if (!Array.isArray(data)) {
      console.log("Not an array:", data);
      return;
    }

    cartItems.innerHTML = "";

    data.forEach((item) => {
      let div = document.createElement("div");
      div.className = "cursor-pointer";

      div.innerHTML = `
        <div class="flex justify-between w-full">
 <div id="item" class="flex gap-2 items-center">
            <img class="sm:w-[90px] sm:h-[90px] w-[68px] h-[68px] rounded-lg object-cover" src="${item.image}" alt="">
           <div class="flex flex-col gap-1 ">
           <h1 class="font-semibold text-xs max-w-36">${item.title}</h1>
           <p class="text-xs w-fit text-white py-2 px-2 rounded-lg">${item.price} $</p>
           
           </div>
           </div>
           <div>

           <div class="flex flex-col justify-between h-full items-center">
           <form  action="/GiftCards/public/index.php/delete" method="POST">
          <input type="hidden" name="_method" value="DELETE">
          <input type="hidden" name="id" value="${item.item_id}">
           <button type="submit" name="deleteItem" class="text-white ">🗑</button>
                       </form>

            <div class="flex gap-2">
<form  action="/GiftCards/public/index.php/decrement" method="POST">
          <input type="hidden" name="_method" value="PATCH">
          <input type="hidden" name="id" value="${item.item_id}">
           <button type="submit" name="deleteItem" class="text-white bg-red-500 w-8 h-6 flex items-center justify-center">-</button>
          </form>
            <p class="text-white">${item.quantity}</p>
            <form  action="/GiftCards/public/index.php/increment" method="POST">
          <input type="hidden" name="_method" value="PATCH">
          <input type="hidden" name="id" value="${item.item_id}">
           <button type="submit" name="deleteItem" class="text-white bg-blue-500 w-8 h-6 flex items-center justify-center ">+</button>
          </form>

            </div>
           </div>
           </div>
           </div>
      `;

      cartItems.appendChild(div);

      if(item.quantity === 0){
        cartItmes.innerHTML = "";
      }
    });

  } catch (error) {
    console.error("Error:", error);
  }
}

const inputSearch = document.getElementById("inputSearch")
    const searchSection = document.getElementById("searchSection")

    async function fetchSearch() {
    
    try {
      const response = await fetch("/GiftCards/api/fetchItems.php");
      if (!response.ok) throw new Error("could not fetch");
  
       const data = await response.json(); // <-- this is an arr

       
       
       inputSearch.addEventListener("input" , ()=>{
        searchSection.innerHTML = "";
        const value = inputSearch.value.toLowerCase().trim();
        if (!value) {
          searchSection.classList.add("hidden");
          return;
        }
        let results = data.filter(item => item.title.toLowerCase().startsWith(value));
          
            results.forEach(item =>{
              let div = document.createElement("div")
              div.innerHTML =
            `
             <a href="/GiftCards/public/index.php/show?id=${item.id}">
                <div class="flex  gap-5   w-fit">
                <img class="w-16 rounded-lg object-cover" src="${item.image}" alt="">
                <div class="flex flex-col gap-1 ">
                <p class="text-white text-sm font-bold movieName">${item.title}</p>
                </div>
                </div>
            </a>
            `;
              
            searchSection.appendChild(div);
           
        
            })
        searchSection.classList.remove("hidden")
       })
          
      


      
        
    } catch (error) {
      console.log(error);
    }
  }

  fetchSearch();

fetchData();
    
    const logoutMenu = document.getElementById("logoutMenu");
    const pfBtn = document.getElementById("pfBtn");
    pfBtn.addEventListener("click" , ()=>{
      logoutMenu.classList.toggle("hidden");
    })
    
    </script>
