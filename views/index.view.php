<?php
require base_path('views/partials/nav.php'); ?>
<section class="grid grid-cols-1 md:grid-cols-3 gap-3  lg:px-[135px] py-8 ">
    <div class=" col-span-2 ">
    <div class="swiper relative">
    
    <!-- Additional required wrapper -->
    <div class="swiper-wrapper relative">
      <!-- Slides -->
      
    <div class="relative swiper-slide">
    <img class="sm:rounded-lg w-full"  src= "/GiftCards/public/img/cf.jpg" alt="">
    <div class="z-10 absolute top-[40%] px-16 left-0 text-white flex flex-col gap-2">

    </div>
    </div>

    <div class="relative swiper-slide">
    <img class="sm:rounded-lg h-full  " src= "/GiftCards/public/img/cf1.jpg" alt="">
    <div class="z-10 absolute top-[40%] px-16 left-0 text-white flex flex-col gap-2">

    </div>
    </div>

    

    
    
       
    </div>
    
    <button class="swiper-prev absolute top-1/2 -translate-y-1/2 left-3 z-20">
        <i class="fa-solid fa-caret-left bg-white w-8 h-8 flex items-center justify-center rounded-full"></i>
    </button>

    <button class="swiper-next absolute top-1/2 -translate-y-1/2 right-3 z-20">
        <i class="fa-solid fa-caret-right bg-white w-8 h-8 flex items-center justify-center rounded-full"></i>
    </button>
    <div class="swiper-pagination"></div>
  </div>
  
   
    </div>
        <div class=" grid grid-cols-2 md:grid-cols-1 gap-2 sm:w-full w-screen">
    <div class="relative">
    <img class="sm:rounded-lg " src= "/GiftCards/public/img/cf2.jpg" alt="">
    <div class="md:text-lg text-xs absolute bottom-0 py-5 px-2 md:px-5 left-0 text-white flex flex-col gap-2">

    </div>
    </div>
    
    <div class="relative block md:hidden">
    <img class="sm:rounded-lg " src= "/GiftCards/public/img/cf3.jpg" alt="">
    <div class="md:text-lg text-xs absolute bottom-0 py-5 px-2 md:px-5 left-0 text-white flex flex-col gap-2">

    </div>
    </div> 
    
    </div>
</section>

   
   
           
    <section class="lg:px-[135px] px-14 pt-10 pb-24">
  <h1 class="text-lg font-semibold mb-5 text-white">
    Best Selling Weapons <i class="fa-solid fa-angle-right text-sm"></i>
  </h1>

  <!-- Swiper -->
  <div class="overflow-hidden">
  <div class="mySwiper relative">
    <div class="swiper-wrapper" id="gameSection">
      
    <?php foreach($gcards as $gcard) :?>
      <div class="swiper-slide w-fit cursor-pointer">
      <a href="/GiftCards/public/index.php/show?id=<?= $gcard['id'] ?>">
        <div class="relative w-80  h-52   rounded-lg">
          <img src="<?= $gcard['image'] ?>" class="block w-full h-full rounded-lg" alt="">
          <div class=" absolute top-0 right-0 text-white text-xs p-5">
          <span class="bg-black/40 px-2 py-1 rounded">
                <?= $gcard['price'] ?> $
              </span>
          </div>
          <div class="absolute inset-x-0 bottom-0 p-3 rounded-lg 
                      bg-gradient-to-t from-black/80 to-transparent
                      text-white font-bold">

            <div class="flex justify-between items-center text-xs mt-2">
            <p class="text-xs movieName font-bold">
            <?= $gcard['title'] ?>
            </p>
              <span>5⭐</span>
              
            </div>
          </div>
      </div>
      </a>
      </div>
      
    <?php endforeach; ?>  
      
    

</div>

    <!-- Navigation -->
    <button class="swiper-prev absolute top-1/2 -translate-y-1/2 left-3 z-20">
        <i class="fa-solid fa-caret-left bg-white w-8 h-8 flex items-center justify-center rounded-full"></i>
    </button>

    <button class="swiper-next absolute top-1/2 -translate-y-1/2 right-3 z-20">
        <i class="fa-solid fa-caret-right bg-white w-8 h-8 flex items-center justify-center rounded-full"></i>
    </button>
  </div>
  </div>
</section>


<section class="lg:px-[135px] px-14 pt-10 pb-24">
  <h1 class="text-lg font-semibold mb-5">
    Best Selling Apps <i class="fa-solid fa-angle-right text-sm"></i>
  </h1>

  <!-- Swiper -->
  <div class="overflow-hidden">
  <div class="mySwiper relative">
    <div class="swiper-wrapper" id="appSection">
    <p class="text-black text-2xl"><?= $count['count'] ?></p>
    <p><?= $_SESSION['user']['email'] ?></p>


</div>

    <!-- Navigation -->
    <button class="swiper-prev absolute top-1/2 -translate-y-1/2 left-3 z-20">
        <i class="fa-solid fa-caret-left bg-white w-8 h-8 flex items-center justify-center rounded-full"></i>
    </button>

    <button class="swiper-next absolute top-1/2 -translate-y-1/2 right-3 z-20">
        <i class="fa-solid fa-caret-right bg-white w-8 h-8 flex items-center justify-center rounded-full"></i>
    </button>
  </div>
  </div>
</section>
 
<?php require base_path('views/partials/cart.php'); ?>
<script src="/GiftCards/public/script.js"></script>
</body>

</html>