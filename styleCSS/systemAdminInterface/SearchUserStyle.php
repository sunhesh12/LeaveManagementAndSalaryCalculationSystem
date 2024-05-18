<?php 
    header('Content-type:text/css; charset:UTF-8');
?> 
::-webkit-scrollbar {
    width: 1px; /
}

::-webkit-scrollbar-track {
    background: white; 
}

::-webkit-scrollbar-thumb {
    background: white; 
    height: 10px; 
}
.Div-container{
    /* background-color: brown; */
    width: 78%;
    position: absolute;
    height:88%;
    margin-left: 21%;
    margin-top: 1%;
    overflow-y: auto;
    padding-bottom: 20px;
}

.Div-UpperBox{
    background-color:  rgb(205, 215, 253);
    width: 90%;
    height: auto;
    margin-left: 5%;
    margin-top: 1%;
    border-radius: 30px;
    text-align: left;
    padding-bottom: 10px;
}

.Div-lowerBox{
    background-color:  rgb(205, 215, 253);
    width: 90%;
    height: auto;
    margin-left: 5%;
    margin-top: 1%;
    border-radius: 30px;
    text-align: center;
    padding-bottom: 10px;
}

p{
    font-size:x-large;
    margin-left: 40px;
}
input , select{
    width: 60%;
    height: 50px;
    border-radius: 20px;
    outline: none;
    border: none;
    padding-left: 5px;
    margin-top: 20px;
    font-size: large;
    color:grey;
}
input{
    margin-left:38px
}
.img1{
    width: 20%; 
    height:20%;
}

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

.Div-lowerBox p{
    margin-left: 0px;
}

.Div-UpperBox button{
    width: 120px;
}