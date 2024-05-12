<?php 
    header('Content-type:text/css; charset:UTF-8');
?> 
button{
    width: 20%;
    height: 50px;
    font-size: large;
    font-weight: bold;
    background-color: rgb(0, 123, 255);
    color: white;
    margin: 3%;
    outline: none;
    border: none;
    border-radius: 10px;
}

button:hover{
    background-color: rgb(0, 13, 255); 
}

h1{
    padding-top:2.5%;
}
table {
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 90%;
    margin-bottom: 2.5%;
    margin-left: 5%;
}

td, th {
    border: 1px solid #dddddd;
    text-align: left;
    padding: 8px;
    font-size: large;
    font-weight: bold;
}

tr:nth-child(even) {
    background-color: rgb(255, 255, 249);
}
tr:nth-child(odd) {
    background-color: rgb(182, 185, 249);
}