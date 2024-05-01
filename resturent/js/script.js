let menu = document.querySelector('#menu-bars');
let navbar = document.querySelector('.navbar');


    menu.onclick = () =>{
        menu.classList.toggle('fa-times');
        navbar.classList.toggle('active');
    }

    let section = document.querySelectorAll('section');
    let navLinks = document.querySelectorAll('header .navbar a');


    window.onscroll = () =>{

      window.addEventListener('scroll', function() {
        const header = document.querySelector('header');
        header.classList.toggle('sticky', window.scrollY > 0);
        const sections = document.querySelectorAll('section');
        const navLinks = document.querySelectorAll('nav a');

        sections.forEach(section => {
            const sectionTop = section.offsetTop;
            const sectionHeight = section.clientHeight;
            if (pageYOffset >= sectionTop - sectionHeight / 3) {
                navLinks.forEach(navLink => {
                    navLink.classList.remove('active');
                });
                const targetLink = document.querySelector('nav a[href="#' + section.id + '"]');
                targetLink.classList.add('active');
            }
        });
    });

    

    }
    document.querySelector('#search-icon') .onclick = () =>{
        document.querySelector('#search-form') .classList.toggle('active');
    } 
    
    document.querySelector('#close') .onclick = () =>{
        document.querySelector('#search-form') .classList.remove('active');
    } 


  
    var swiper = new Swiper(".home-slider", {
      spaceBetween: 30,
      centeredSlides: true,
      autoplay: {
        delay: 2500,
        disableOnInteraction: false,
      },
      pagination: {
        el: ".swiper-pagination",
        clickable: true,
      },
     loop:true,
    });

    var swiper = new Swiper(".review-slider", {
      spaceBetween: 20,
      centeredSlides: true,
      autoplay: {
        delay: 2500,
        disableOnInteraction: false,
      },
      loop:true,
    breakpoints:{
      0:{
        slidesPerView:1,
      },
      640:{
        slidesPerView:2,
      },
      768:{
        slidesPerView:2,
      },
      1024:{
        slidesPerView:3,
      },
    },
     
    });



    /*------------------------------------------------------cart js------------------------------------------------------------*/


    document.addEventListener('DOMContentLoaded', function() {
      const cartItems = document.querySelector('.cart-items');
      const totalSpan = document.getElementById('total');
  
      // Dummy data for demonstration
      const menuItems = [
          { id: 1, name: 'Pizza', price: 10 },
          { id: 2, name: 'Burger', price: 5 },
          { id: 3, name: 'Salad', price: 7 }
      ];
  
      // Function to render cart items
      function renderCart() {
          cartItems.innerHTML = '';
          let totalPrice = 0;
          cart.forEach(item => {
              const cartItem = document.createElement('div');
              cartItem.classList.add('cart-item');
              cartItem.innerHTML = `
                  <img src="item.jpg" alt="${item.name}">
                  <span>${item.name}</span>
                  <span>$${item.price.toFixed(2)}</span>
                  <button class="remove-item" data-id="${item.id}">Remove</button>
              `;
              cartItems.appendChild(cartItem);
              totalPrice += item.price;
          });
          totalSpan.textContent = `$${totalPrice.toFixed(2)}`;
      }
  
      // Function to add item to cart
      function addToCart(id) {
          const item = menuItems.find(item => item.id === id);
          if (item) {
              cart.push(item);
              renderCart();
          }
      }
  
      // Function to remove item from cart
      function removeFromCart(id) {
          const index = cart.findIndex(item => item.id === id);
          if (index !== -1) {
              cart.splice(index, 1);
              renderCart();
          }
      }
  
      // Event listener for adding items to cart
      document.querySelectorAll('.add-to-cart').forEach(button => {
          button.addEventListener('click', function() {
              const itemId = parseInt(this.dataset.id);
              addToCart(itemId);
          });
      });
  
      // Event listener for removing items from cart
      document.addEventListener('click', function(event) {
          if (event.target.classList.contains('remove-item')) {
              const itemId = parseInt(event.target.dataset.id);
              removeFromCart(itemId);
          }
      });
  
      // Initialize cart
      const cart = [];
  });
  