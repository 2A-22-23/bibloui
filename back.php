<!DOCTYPE html>

<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title>  Admin Dashboard |  </title>
    <link rel="stylesheet" href="style.css">
   
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
<body>
  <div class="sidebar">
    <div class="logo-details">
      <i class='bx bxl-c-plus-plus'></i>
      <span class="logo_name">BIBLOUI</span>
    </div>
      <ul class="nav-links">
        <li>
          <a href="#" class="active">
            <i class='bx bx-grid-alt' ></i>
            <span class="links_name">Dashboard</span>
          </a>
        </li>
        <li>
          <a href="reponse.php">
            <i class='bx bx-box' ></i>
            <span class="links_name">Réponse</span>
          </a>
        </li>
        <li>
          <a href="#">
            <i class='bx bx-list-ul' ></i>
            <span class="links_name">Livres</span>
          </a>
        </li>
        <li>
          <a href="#">
            
            <i class='bx bx-pie-chart-alt-2' ></i>
            <span class="links_name">Evenement</span>
          </a>
        </li>
        <li>
          <a href="#">
            <i class='bx bx-coin-stack' ></i>
            <span class="links_name">Se Connecter</span>
          </a>
        </li>
        <li>
          <a href="#">
            <i class='bx bx-book-alt' ></i>
            <span class="links_name">Formation</span>
          </a>
        </li>
        <li>
          <a href="#">

            <i class='bx bx-user' ></i>
            <span class="links_name">Catégorie</span>
          </a>
        </li>
        <li>
          <a href="reclamation.php">
            <i class='bx bx-message' ></i>
            <span class="links_name">contact</span>
          </a>
        </li>
        <li>
          <a href="#">
            <i class='bx bx-heart' ></i>
            <span class="links_name">Catégorie livre</span>
          </a>
        </li>
        <li>
          <a href="#">
            <i class='bx bx-cog' ></i>
            <span class="links_name">Setting</span>
          </a>
        </li>
        <li class="log_out">
          <a href="#">
            <i class='bx bx-log-out'></i>
            <span class="links_name">Log out</span>
          </a>
        </li>
      </ul>
  </div>
  <section class="home-section">
    <nav>
      

      <div class="sidebar-button">
        <i class='bx bx-menu sidebarBtn'></i>
        <span class="dashboard">Dashboard</span>
      </div>
      <div class="search-box">

        <input type="text" placeholder="Search...">
        <i class='bx bx-search' ></i>
      </div>
      <div class="profile-details">
        <img src="me.jpg.jpg" alt="">
        <span class="admin_name">BAYA CHAABEN</span>
        <i class='bx bx-chevron-down' ></i>
      </div>
      
    </nav>

    <div class="home-content">
  
   
      <div class="overview-boxes">
        <div class="box">
          <div class="right-side">
            <div class="box-topic">Total Order</div>
            <div class="number"></div>
            <div class="indicator">
              <i class='bx bx-up-arrow-alt'></i>
              <span class="text"></span>
            </div>
          </div>
         
          <i class='bx bx-cart-alt cart'></i>
        </div>
        <div class="box">
          <div class="right-side">

            <div class="box-topic">Total Sales
  
            </div>
            <div class="number"></div>
            <div class="indicator">
              <i class='bx bx-up-arrow-alt'></i>
              <span class="text"></span>
            </div>
          </div>
          <i class='bx bxs-cart-add cart two' ></i>
        </div>
        <div class="box">
          <div class="right-side">
            <div class="box-topic">Total Profit</div>
            <div class="number"></div>
            <div class="indicator">
              <i class='bx bx-up-arrow-alt'></i>
              <span class="text"></span>
            </div>
          </div>
          <i class='bx bx-cart cart three' ></i>
        </div>
        <div class="box">
          <div class="right-side">
            <div class="box-topic">Total Return</div>
            <div class="number"></div>
            <div class="indicator">
              <i class='bx bx-down-arrow-alt down'></i>
              <span class="text"></span>
            </div>
          </div>
          <i class='bx bxs-cart-download cart four' ></i>
        </div>
      </div>

      <div class="sales-boxes">
        <div class="recent-sales box">
          <div class="title">Recent Sales</div>
          <div class="sales-details">
            <ul class="details">
              <li class="topic">Date</li>
              
            </ul>
            <ul class="details">
            <li class="topic">Customer</li>
           
          </ul>
          <ul class="details">
            <li class="topic">Sales</li>
          
          </ul>
          <ul class="details">
            <li class="topic">Total</li>
          
          </ul>
          </div>
          <div class="button">
            <a href="#">See All</a>
          </div>
        </div>
        <div class="top-sales box">
          <div class="title">Top Seling Books</div>
          <ul class="top-sales-details">
            <li>
            <a href="#">
              
            </a>
          
          </li>
          <li>
            <a href="#">
            
            </a>
            
          </li>
          <li>
            <a href="#">
             
            </a>
          
          </li>
          <li>
            <a href="#">
              
            </a>
      
          </li>
          <li>
            <a href="#">
            
            </a>
        
          </li>
          <li>
            <a href="#">
           
            </a>
           
          <li>
            <a href="#">
         
            </a>
           
          </li>
<li>
            <a href="#">
            
            </a>
       
          </li>
          </ul>
        </div>
      </div>
    </div>
  </section>

  <script>
   let sidebar = document.querySelector(".sidebar");
let sidebarBtn = document.querySelector(".sidebarBtn");
sidebarBtn.onclick = function() {
  sidebar.classList.toggle("active");
  if(sidebar.classList.contains("active")){
  sidebarBtn.classList.replace("bx-menu" ,"bx-menu-alt-right");
}else
  sidebarBtn.classList.replace("bx-menu-alt-right", "bx-menu");
}
 </script>

</body>
</html>
