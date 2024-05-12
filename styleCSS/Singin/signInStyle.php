<?php 
    header('Content-type:text/css; charset:UTF-8');
?> 

body {         
    background-image: url('image.png');
    background-size: 100% auto;

}

.div-background{
    background-color: rgba(255, 255, 255, 0.418);
    border-radius: 5%;
    width: 50%;
    height: 80%;
    position:relative;
    margin-left: 25%;
    margin-top: 5%;
    text-align: center;
    align-items: center;
}
.div-logo{
    text-align: center;
    align-content: center;
    width: 100%;
    height: 100%;
    margin-left: 5%;
}

input{
    margin: 10px;
    width: 60%;
    height: 40px;
    border-radius: 10px;
    padding: 5px;
    font-size: medium;
    background-color: rgba(240, 248, 255, 0.692);
    border-style: groove;
    border: none;
    outline: none;
}

.btn-log-in{
    width: 30%;
    height: 40px;
    border-radius: 10px;
    margin-top: 20px;
    margin-bottom: 20px;
    padding: 5px;
    font-size: medium;
    background-color: rgba(240, 248, 255, 0.692);
    border-style: groove;
    border: none;
    outline: none;
    font-weight: bold;
}

.btn-log-in:hover{
    background-color: rgba(13, 7, 104, 0.692);
    color: white;
}

#rememberMeCheckbox{
    width: auto;
    height: auto;
    margin: 0px;
    background-color: rgba(240, 248, 255, 0.675);
}
.div-lab{
    margin-left: 20%;
    width: 60%; 
    /* background-color: red;  */
    height: 10px;
}
#error-text{
    color: rgb(255, 0, 0); 
    font-weight: bolder; 
}

@media screen and (max-width:840px){
    body {         
    background-image: url('image.png');
    background-size: auto auto;
}

    .div-background{
        background-color: rgba(255, 255, 255, 0.418);
        border-radius: 5%;
        width: 95%;
        height: 80%;
        margin-top:40%;
        margin-bottom:40%;
        position: relative;
        margin-left: 10%;
    }

    .div-logo{
        /* text-align: center; */
        align-content: center;
        width: 100%;
        height: 100%;
        margin-left: 15%;
    }
    
    input{
    margin: 10px;
    width: 80%;
    height: 40px;
    border-radius: 10px;
    padding: 5px;
    font-size: medium;
    background-color: rgba(240, 248, 255, 0.692);
    border-style: groove;
    border: none;
    outline: none;
    /* border-style: none; */
}

.btn-log-in{
    width: 50%;
    height: 40px;
    border-radius: 10px;
    margin-top: 20px;
    margin-bottom: 20px;
    padding: 5px;
    font-size: medium;
    background-color: rgba(240, 248, 255, 0.692);
    border-style: groove;
    border: none;
    outline: none;
    font-weight: bold;
}
#rememberMeCheckbox{
    width: auto;
    height: auto;
    margin: 0px;
    background-color: rgba(240, 248, 255, 0.675);
}
.div-lab{
    margin-left: 10%;
    width: 80%; 
    /* background-color: red;  */
    height: 10px;
}
#error-text{
    color: rgb(255, 0, 0); 
    font-weight: bolder;
    float: left;
    
}
}