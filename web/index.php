<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Railway DZ</title>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
<link rel="stylesheet" href="css/style.css">

<style>
@import url('https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700&display=swap');

:root{
 --main-color:#1B385B;
--black:#000;
--bg:#010103;
--white:#ffffff;

--border:.1rem solid rgba(255,255,255,.3);
}
body {
  -ms-overflow-style: none; /* for Internet Explorer, Edge */
  scrollbar-width: none; /* for Firefox */
  overflow-y: scroll; 
}

body::-webkit-scrollbar {
  display: none; /* for Chrome, Safari, and Opera */
}
*{
font-family: 'Roboto', sans-serif;
margin:0; padding:0;
box-sizing: border-box;
outline: none; border:none;
text-decoration: none;
text-transform: capitalize;
transition: .2s linear;
border-radius: 30px;
}

html{
font-size: 62.5%;
overflow-x: hidden;
scroll-padding-top: 9rem;
scroll-behavior: smooth;
}

html::-webkit-scrollbar{
width: .8rem;
}

html::-webkit-scrollbar-track{
background: transparent;
}

html::-webkit-scrollbar-thumb{
background: #fff;
border-radius: 5rem;
}

body{
background: var(--bg);
}

section{
padding:2rem 7%;
}

.heading{
    margin-top: 5%;
text-align: center;
color:#fff;
text-transform: uppercase;
padding-bottom: 3.5rem;
font-size: 4rem;
}

.heading span{
color:var(--main-color);
text-transform: uppercase;
}

.btn{
    height:45px;
margin-top: 1rem;
display: inline-block;
padding:.9rem 3rem;
font-size: 1.7rem;
color:#fff;
background: var(--main-color);
cursor: pointer;
}

.btn:hover{
    letter-spacing: .2rem;
}

.header{
    background: var(--bg);
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding:1.5rem 7%;
    border-bottom: var(--border);
    position: fixed;
    top:0; left: 0; right: 0;
    z-index: 1000;
}

.header .logo img{
    height: 6rem;
}

.header .navbar a{
    margin:0 1rem;
    font-size: 1.6rem;
    color:#1B385B;
}

.header .navbar a:hover{
    color:var(--main-color);
    border-bottom: .1rem solid var(--white);
    padding-bottom: .5rem;
}

.header .icons div{
    color: #1B385B;
    cursor: pointer;
    font-size: 2.5rem;
    margin-left: 2rem;
}

.header .icons div:hover{
    color:var(--main-color);
}

#menu-btn{
    display: none;
}

.header .search-form{
    position: absolute;
    top:115%; right: 7%;
    background: #fff;
    width: 50rem;
    height: 5rem;
    display: flex;
    align-items: center;
    transform: scaleY(0);
    transform-origin: top;
}

.header .search-form.active{
    transform: scaleY(1);
}

.header .search-form input{
    height: 100%;
    width: 100%;
    font-size: 1.6rem;
    color:var(--black);
    padding:1rem;
    text-transform: none;
}

.header .search-form label{
    cursor: pointer;
    font-size: 2.2rem;
    margin-right: 1.5rem;
    color:var(--black);
}

.header .search-form label:hover{
    color:var(--main-color);
}

.header .cart-items-container{
    position: absolute;
    top:100%; right: -100%;
    height: calc(100vh - 9.5rem);
    width: 35rem;
    background: #fff;
    padding:0 1.5rem;
}

.header .cart-items-container.active{
    right: 0;
}

.header .cart-items-container .cart-item{
    position: relative;
    margin:2rem 0;
    display: flex;
    align-items: center;
    gap:1.5rem;
}

.header .cart-items-container .cart-item .fa-times{
    position: absolute;
    top:1rem; right: 1rem;
    font-size: 2rem;
    cursor: pointer;
    color: var(--black);
}

.header .cart-items-container .cart-item .fa-times:hover{
    color:var(--main-color);
}

.header .cart-items-container .cart-item img{
    height: 7rem;
}

.header .cart-items-container .cart-item .content h3{
    font-size: 2rem;
    color:var(--black);
    padding-bottom: .5rem;
}

.header .cart-items-container .cart-item .content .price{
    font-size: 1.5rem;
    color:var(--main-color);
}

.header .cart-items-container .btn{
    width: 100%;
    text-align: center;
}

.home{
    min-height: 40vh;
    display: absolute;
    top: 20%;
    align-items: center;
    /* background:url(rawna.jpg) no-repeat; */
    background-size: cover;
    background-position: center;
}

.home .content{
    max-width: 60rem;
}

.home .content h3{
    font-size: 6rem;
    text-transform: uppercase;
    color:#1B385B;}

.home .content p{
    font-size: 2rem;
    font-weight: lighter;
    line-height: 1.8;
    padding:1rem 0;
    color:#1B385B;
}

.about .row{
    display: flex;
    align-items: right;
    background:var(--black);
    flex-wrap: wrap;
}

.about .row .image{
    flex:1 1 45rem;
}

.about .row .image img{
    width: 100%;
}
.about .row .content{
    flex:1 1 45rem;
    padding:2rem;
}

.about .row .content h3{
    font-size: 3rem;
    color:#fff;
}

.about .row .content p{
    font-size: 1.6rem;
    color:#fff;
    padding:1rem 0;
    line-height: 1.8;
}

.menu .box-container{
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(30rem, 1fr));
    gap:1.5rem;
}

.menu .box-container .box{
    padding:5rem;
    text-align: center;
    border:var(--border);    
}

.menu .box-container .box img{
    height: 10rem;
}

.menu .box-container .box h3{
    color: #fff;
    font-size: 2rem;
    padding:1rem 0;
}

.menu .box-container .box .price{
    color: #fff;
    font-size: 2.5rem;
    padding:.5rem 0;
}

.menu .box-container .box .price span{
    font-size: 1.5rem;
    text-decoration: line-through;
    font-weight: lighter;
}

.menu .box-container .box:hover{
    background:#fff;
}

.menu .box-container .box:hover > *{
    color:white;
}

.review .box-container{
    display:grid;
    grid-template-columns:repeat(auto-fit, minmax(30rem, 1fr));
    gap:1.5rem;
}

.review .box-container .box{
    border:var(--border);
    text-align: center;
    padding:5rem 2rem;
}

.review .box-container .box p{
    font-size: 1.5rem;
    line-height: 1.8;
    color:#ccc;
    padding:10rem 10;
}

.review .box-container .box .user{
    height: 10rem;
    width: 10rem;
    border-radius: 50%;
    object-fit: cover;
}

.review .box-container .box h3{
    padding:1rem 0;
    font-size: 2rem;
    color:#fff;
}

.review .box-container .box .stars i{
    font-size: 1.5rem;
    color:var(--main-color);
}

.contact .row{
    display: flex;
    background:var(--black);
    flex-wrap: wrap;
    gap:1rem;
}

.contact .row .map{
    flex:1 1 45rem;
    width: 100%;
    object-fit: cover;
}

.contact .row form{
    flex:1 1 45rem;
    padding:5rem 2rem;
    text-align: center;
}

.contact .row form h3{
    text-transform: uppercase;
    font-size: 3.5rem;
    color:#fff;
}

.contact .row form .inputBox{
    display: flex;
    align-items: center;
    margin-top: 2rem;
    margin-bottom: 2rem;
    background:var(--bg);
    border:var(--border);
}

.contact .row form .inputBox span{
    color:#fff;
    font-size: 2rem;
    padding-left: 2rem;
}

.contact .row form .inputBox input{
    width: 100%;
    padding:2rem;
    font-size: 1.7rem;
    color:#fff;
    text-transform: none;
    background:none;
}

.blogs .box-container{
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(30rem, 1fr));
    gap:1.5rem;
}

.blogs .box-container .box{
    border:var(--border);    
}

.blogs .box-container .box .image{
    height: 25rem;
    overflow:hidden;
    width: 100%;
}

.blogs .box-container .box .image img{
    height: 100%;
    object-fit: cover;
    width: 100%;
}

.blogs .box-container .box:hover .image img{
    transform: scale(1.2);
}

.blogs .box-container .box .content{
    padding:2rem;
}

.blogs .box-container .box .content .title{
    font-size: 2.5rem;
    line-height: 1.5;
    color:#fff;
}

.blogs .box-container .box .content .title:hover{
    color:var(--main-color);
}

.blogs .box-container .box .content span{
    color:var(--main-color);
    display: block;
    padding-top: 1rem;
    font-size: 2rem;
}

.blogs .box-container .box .content p{
    font-size: 1.6rem;
    line-height: 1.8;
    color:#ccc;
    padding:1rem 0;
}

.footer{
    background:var(--black);
    text-align: center;
}

.footer .share{
    padding:1rem 0;
}

.footer .share a{
    height: 5rem;
    width: 5rem;
    line-height: 5rem;
    font-size: 2rem;
    color:#fff;
    border:var(--border);
    margin:.3rem;
    border-radius: 50%;
}

.footer .share a:hover{
    background-color: var(--main-color);
}

.footer .links{
    display: flex;
    justify-content: center;
    flex-wrap: wrap;
    padding:2rem 0;
    gap:0px;
}

.footer .links a{
    padding:.7rem 2rem;
    color:#fff;
    border:var(--border);
    font-size: 2rem;
}

.footer .links a:hover{
    background:var(--main-color);
}

.footer .credit{
    font-size: 2rem;
    color:#fff;
    font-weight: lighter;
    padding:1.5rem;
}

.footer .credit span{
    color:var(--main-color);
}













/* media queries  */
@media (max-width:991px){

    html{
        font-size: 55%;
    }

    .header{
        padding:1.5rem 2rem;
    }

    section{
        padding:2rem;
    }

}

@media (max-width:768px){

    #menu-btn{
        display: inline-block;
    }

    .header .navbar{
        position: absolute;
        top:100%; right: -100%;
        background: #fff;
        width: 30rem;
        height: calc(100vh - 9.5rem);
    }

    .header .navbar.active{
        right:0;
    }

    .header .navbar a{
        color:var(--black);
        display: block;
        margin:1.5rem;
        padding:.5rem;
        font-size: 2rem;
    }

    .header .search-form{
        width: 90%;
        right: 2rem;
    }

    .home{
        background-position: left;
        justify-content: center;
        text-align: center;
     
    }

    .home .content h3{
        font-size: 4.5rem;
    }

    .home .content p{
        font-size: 1.5rem;
    }

}

@media (max-width:450px){

    html{
        font-size: 50%;
    }

}
.logo {
    display: flex;
    align-items: center;
    width: 300px;
    padding-left: 5px;
}

.logo span {
    
    color: #172F46;
}

.gallery-container {
    position: relative;
    display: flex;
    justify-content: center;
  }
  
  .thumbnails {
    position: absolute;
    bottom: 8px;
    display: flex;
    flex-direction: row;
    gap: 6px;
  }
  
  .thumbnails div {
    width: 8px;
    height: 8px;
    cursor: pointer;
    background: #aaa;
    border-radius: 100%;
  }
  
  .thumbnails div.highlighted {
    background-color: #777;
  }
  
  .slides {
    margin: 0 16px;
    display: grid;
    grid-auto-flow: column;
    gap: 1rem;
    width: 10px;
    padding: 0 0.25rem;
    height: 0px;
    overflow-y: auto;
    overscroll-behavior-x: contain;
    scroll-snap-type: x mandatory;
    scrollbar-width: none;
  }
  
  .slides > div {
    scroll-snap-align: start;
  }
  
  .slides img {
    width: 0px;
    object-fit: contain;
  }
  
  .slides::-webkit-scrollbar {
    display: none;
  }



  .grid-container {
  display: grid;
  column-gap: 70px;
}
.grid-item0{
    grid-column-start: 1;
    grid-column-end: 5;
    grid-row-start: 2;
  grid-row-end: 3;
}
.grid-item1 {
  grid-column-start: 1;
  grid-column-end: 2;
  grid-row-start: 2;
  grid-row-end: 3;
}



.grid-item2{
  grid-column-start: 3;
  grid-column-end: 4;
  grid-row-start: 2;
  grid-row-end: 3;
}


.grid-item3{
  grid-column-start: 1;
  grid-column-end: 3;
  text-align: right;
 
}


.grid-item4 {
    grid-row-start: 1;
  grid-row-end: 1;

}
.home{
    margin-bottom: 150px;
}

.t1{
 font-weight: 300;

}

.t2{
 font-weight: 300;
 font-size:larger;

}
.t3{
    font-weight: 200;
    font-size: x-large;
}
.k1,.k2 {
    font-size:larger;
    font-weight: 900;
}


.tit1,.tit1{   
    color: #3872A1; 
    padding: 0px;
    font-weight: 900;
    font-size:45px;
    font-size: Bold;
     border-radius: 10px;
    text-decoration: none;
}



.tit1{
        font-size: 25px;
        font-style: italic;
        text-transform: uppercase;
        font-weight: bold;
    }
    .navbar a{
        text-decoration: none;
        padding: 20px;
        
    }
    .navbar{
        right: 0;
     
    }
    .header .navbar a:hover{
    color:white;
    transform: scale(1.4);
    border-top: .1rem solid var(--main-color);
    border-bottom: .1rem solid var(--main-color);
    padding-bottom: .5rem;
    padding-top: .5rem;
    background-color: #1B385B;
    opacity: 0.5;
    border-radius: 10px;
}
.active_a{
    
    border-bottom: .1rem solid white;
    padding-bottom: .5rem;
   border-radius: 10px;
}
.image img{
    border-radius: 20px;
}
.content p,a{
    margin-left: 80px;
}

    </style>

</head>
<body>
    
<!-- header section starts  -->
<header class="header">
    <div class="logo"><pre><span class="tit1" >Algeria</span>   <span class="tit1" >Express</span>      </pre> <br>
        <img src="algeriee.png" alt="">
    
        
        </div>
            

        

    







    <nav class="navbar">
        <a href="index.php" class="active_a">Home</a>
        <a href="#aboutq">About</a>
        <a href="#menu">Gallery</a>
        <a href="../admin/login.php">Admin panel</a>
    </nav>



         
    

    

    <div class="logo">
        <img src="" alt="">
    
        
        </div>
    

    

    <div class="cart-items-container">
        <div class="cart-item">
            <span class="fas fa-times"></span>
            <img src="images/cart-item-1.png" alt="">
            <div class="content">
                <h3>cart item 01</h3>
                <div class="price">$15.99/-</div>
            </div>
        </div>
        <div class="cart-item">
            <span class="fas fa-times"></span>
            <img src="images/cart-item-2.png" alt="">
            <div class="content">
                <h3>cart item 02</h3>
                <div class="price">$15.99/-</div>
            </div>
        </div>
        <div class="cart-item">
            <span class="fas fa-times"></span>
            <img src="images/cart-item-3.png" alt="">
            <div class="content">
                <h3>cart item 03</h3>
                <div class="price">$15.99/-</div>
            </div>
        </div>
        <div class="cart-item">
            <span class="fas fa-times"></span>
            <img src="images/cart-item-4.png" alt="">
            <div class="content">
                <h3>cart item 04</h3>
                <div class="price">$15.99/-</div>
            </div>
        </div>
        <a href="#" class="btn">checkout now</a>
    </div>

</header>




<section class="home" id="home">

    <div class="grid-container">
       
        <div class="grid-item0">
    <div class="content">
        <div class="grid-item1">  <pre><h3><span class="k1">RAILWAY</span>   <span class="t1">Ready  To</span></pre>  </div> 
        <div class="grid-item2"> <pre><h3>      <span class="k1">Dz</span>          <span class="t2"> Take Off  </span></h3> </pre> </div> 
        <br>
        <div class="grid-item3">   <pre><a href="lg.php?log=0" class="btn" style="margin-right:40px; margin-left:30px;">Create Account </a><a href="lg.php" class="btn" style="margin-right:40px;">Log In To Account</a> </pre> </div> 
        
           
        
               
    

    </div> 
</div>



 
<div class="grid-item4" style="visibility:hidden ;">  <div class="content">
     <h3> RAILWAY DZ </h3> 
    <h3>READY TO  TAKE OFF !!</h3> 
    
  

</div>  </div>
</div>
<img src="akhdam.png" alt="" style=" background-color: transparent; outline: none; border: none;   margin-right: 0%;  position: absolute;
top: 27%;
right: 8%;
height: 29%;
width: 48%;"> 
</section>

<section  id="aboutq" class="about" id="about" >
    <div class="sec1">
        
        <div>
            <p></p>
        </div>
    <h1 class="heading"> <span>about</span> us </h1>

    <div class="row">
        <div class="image">
            <img src="imagetrain/img14.jpg" alt="">
        </div>

     <div class="content">
 <p>Facilitate travel in the main cities of Algeria</p>
 <p>Algeriers,Oran,Constantine,Sidi Bel Abbes,Setif</p>
 <p>Ourgla.Open a new era of mobility a mode of that</p>
 <p>that is comfortable ,fast,clean, safe and accessible</p>
 <p>to all this accelerate within and around these key</p>
 <p>cities for the country</p>
            <a href="ff/read.html" class="btn">Read more</a>
        </div>

    </div>

</section>

<!-- about section ends -->

<!-- menu section starts  -->

<section class="menu" id="menu">

    <h1 class="heading"> our <span>Gallery</span> </h1>


    <div class="main1" id="main1" style="display:flex; justify-content: space-between;">
            <button id="left" style="align-items: center; background-color: transparent; outline: none; border: none;"><img src="left3.png"   alt=""></button>
            <img src="imagetrain/21.jpg" id="main" style="  width:55% ;" alt="">
            <button id="right" style="align-items:right; background-color: transparent; outline: none; border: none; "><img src="right3.png"   alt=""></button>
        </div>
    

</section>

<!-- menu section ends -->




<section class="contact" id="contact">

    <h1 class="heading"> <span>Our</span> space </h1>

    <div class="row">

        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d202.49502772881004!2d-0.6486988040666727!3d35.7035753090985!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd7e88e52a5802df%3A0x2238bee6758b0815!2sPlace%20du%201er%20Novembre!5e0!3m2!1sfr!2sdz!4v1670028872364!5m2!1sfr!2sdz" width="1500" height="650" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>        <a href="#" class="logo">
       
        </a>
        
    </div>

</section>


<div class="footer" id="contact">
    <div class="footer-flex">
        <div class="footer1">
            <div>
                <img src="trammwayy.jpg" alt="">
            </div>
            
                
            
        </div>
    </div>
    
</div>
<section class="footer">

   

    <div class="links">
        <a href="index.php">Home</a>
        <a href="#aboutq">About</a>
        <a href="../admin/login.php">Sign In</a>
        <a href="#menu">Gallery</a>



        <!-- <a href="https://www.sntf.dz/index.php/contacts">contact</a> -->
        
    </div>

    <div class="credit">... <span>...</span> ...</div>

</section>







<script>

var src = ['imagetrain/img16.JPG','imagetrain/img8.jpg','imagetrain/img7.jpg','imagetrain/img15.jpg'];
var left = document.getElementById('left');
var right =document.getElementById('right');
var main = document.getElementById('main');
var i=0;

left.addEventListener('click',function(){
    i=i-1;
    if(i<0){
        i=src.length-1;
    }   
main.src=src[i];
})
right.addEventListener('click',function(){
    i=i+1;
    if(i>=src.length){
        i=0;
    }
main.src=src[i];
})

let  fun = setInterval(function(){
var fun1 = setTimeout(function(){
right.click();
},0) 
},4000)
      

          
        </script>

</body>
</html>