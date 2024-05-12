<?php 
    header('Content-type:text/css; charset:UTF-8');
?> 

body{
    margin: 0px;
    padding: 0px;
    border: 0px;
    overflow:hidden;
}
.div-main{
    width: 100%; 
    height: 100%; 
    margin-bottom: 10px;
    background-color: rgb(255, 255, 255);
    /* overflow-y: auto; */
    position: absolute;
}

.div-nav{
    background-color: rgba(0, 22, 101); 
    height: 100% ; 
    width: 20%; 
    float: left;
    padding-top: 20px;
}


.div-main li{
    list-style: none;
    margin-top: 2%;
    text-align: center;
    width: 100%;
    height: 40px;
    background-color: rgb(1, 15, 66);
    display: flex; /* Add flex display */
    justify-content: center; /* Center horizontally */
    align-items: center; /* Center vertically */
}


.div-header{
    width: 100%;
    height: 60px;
    background-color: rgba(0, 22, 101);
}

.div-logo{
    margin-left: 1%;
    display: flex;
    padding-top: 2px;
}

  
  /* Style the sidenav links and the dropdown button */
  .div-nav li a {
    text-decoration: none;
    color:white;
    font-weight: bolder;
    font-size: large;
    padding: 6px 8px 6px 16px;
    text-decoration: none;
    font-size: 20px;
    color: #ffffff;
    display: block;
    border: none;
    background: none;
    width: 100%;
    text-align: left;
    cursor: pointer;
    outline: none;
  }
  
  /* On mouse-over */
  .div-nav li a:hover{
    color: #f1f1f1;
  }
  
  /* Main content */
  .main {
    margin-left: 200px; /* Same as the width of the sidenav */
    font-size: 20px; /* Increased text to enable scrolling */
    padding: 0px 10px;
  }
  
  /* Add an active class to the active dropdown button */
  .active {
    background-color: rgb(9, 0, 128);
    color: white;
  }
  
/* Dropdown container (hidden by default). Optional: add a lighter background color and some left padding to change the design of the dropdown content */
.dropdown-container {
    display: none;
    /* float: left; */
    font-size: large;
    width: 98%;
    text-decoration: none;
    background-color: #00000036;
    padding-left: 5px;
  }
  .dropdown-container li{
    list-style: none;
    margin-top: 2%;
    text-align: center;
    width: 100%;
    height: 40px;
    background-color: rgb(1, 15, 66);
    display: flex; /* Add flex display */
    justify-content: center; /* Center horizontally */
    align-items: center; /* Center vertically */
  }
  .dropdown-container li a {
    color: white;
    text-decoration: none;
    float: left;
    margin: 15px;
  }
  
  /* Optional: Style the caret down icon */
  .fa-caret-down {
    float: right;
    padding-right: 8px;
    color: white;
  }
  
  .fa-caret-right{
    float: right;
    padding-right: 8px;
    color: white;
    
  }
  /* Some media queries for responsiveness */
  /* @media screen and (max-height: 450px) {
    .sidenav {padding-top: 15px;}
    .sidenav li a {font-size: 18px;}
  } */

  .small-boxes{
    box-shadow: 0px 10px 15px 0px black;
    float: left; 
    background-color: rgb(207, 218, 255); 
    width: 40%; 
    height: 20%; 
    margin: 2.5%;
    margin-left:6%;
    margin-top:4%
  }

.Main-Dashboard{
  float: left; 
  border-radius:40px;
  background-color: rgba(255, 255, 255, 0); 
  width: 70%; 
  height: 80%; 
  margin-left:5%;
  margin-top: 2%; 
  margin-bottom: 1%;
  background-color: rgba(252, 186, 3,0.2);
  border :none
  /* position: relative; */
}

.div-icon{
  width: 25%; 
  height: 100%; 
  float:left;
}

.div-icon img{
  height:90%; 
  margin:5%; 
  margin-left: 2%;
}
.div-text{
  width:74%; 
  height:100%; 
  float :right;
}

.div-text h1{
  color: black; 
  padding-left: 5%; 
}

.div-text .h1-number{
  color:black; 
  padding-left: 5%; 
  margin-top: -2%; 
}

  @media screen and (max-width:840px){  
.div-text{
  width:60%; 
  height:100%; 
  float :right;
  <!-- background-color:red; -->
}
.div-text h1{
  color: black; 
  padding-left: 5%; 
  font-size:130%;
}

.div-text .h1-number{
  color:black; 
  padding-left: 5%; 
  margin-top: -2%; 
}

.Main-Dashboard{
    border-radius:40px;
    float: left; 
    width: 90%; 
    height:84%; 
    /* position: relative; */
    overflow-y: auto;
  }
  /* For WebKit browsers */
::-webkit-scrollbar {
    width: 1px; /* Width of the scrollbar */
}

::-webkit-scrollbar-track {
    background: white; /* Color of the scrollbar track */
}

::-webkit-scrollbar-thumb {
    background: white; /* Color of the scrollbar thumb */
    height: 10px; /* Height of the scrollbar thumb */
}


  .small-boxes{
    float: left; 
    background-color: rgb(207, 218, 255); 
    width: 80%; 
    height: 20%; 
    margin: 5%;
    /* margin-bottom: 10px; */
    margin-left: 10%;
  }

  .div-nav{
      background-color: rgba(0, 22, 101); 
      height: 100% ; 
      width: 100%; 
      float: left;
      /* position: fixed; */
      /* z-index: 1; */
      /* top: 0; */
      /* left: 0;  */
      /* overflow-x: hidden; */
      padding-top: 20px;
  }
  
  }

    /* Styling for sidebar button */
    .sidebar-toggle {
      display: none;
  }
  
  /* Media query for screens less than 840 pixels */
  @media (max-width: 839px) {
      .div-nav {
          display: none; /* Hide the sidebar navigation */
      }
      
      .sidebar-toggle {
          display: block; /* Display the button */
          /* position: absolute; */
          top: 60px;
          left: 20px;
          /* background-color: aliceblue; */
          /* color: blue; */
      }

      #toggleNav{
          background-color: white;
          border: none;
          width: 30px;
          height: 30px;
      }

      #toggleNav i{
          font-size: x-large;
      }
    }