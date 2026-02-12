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
        <div class="flex justify-between w-full text-black">
          <div class="flex gap-2 items-center">
            <div class="flex flex-col gap-1">
              <p class="text-xs">${item.id} $</p>
            </div>
          </div>
          <div>
            <p>${item.quantity}</p>
          </div>
        </div>
      `;

      cartItems.appendChild(div);
    });

  } catch (error) {
    console.error("Error:", error);
  }
}

fetchData();





 


