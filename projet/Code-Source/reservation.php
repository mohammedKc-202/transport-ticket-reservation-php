<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Reservation bus</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=M+PLUS+1+Code:wght@100..700&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap"
            rel="stylesheet" />

    <link rel="stylesheet" href="reservation.css" />

</head>

<style>

    *{margin:0px;}
.background{
display:flex;
    align-items: center;
    justify-content: center;
    position:relative;

}

    .background::before{
        content:'';
        background-image:url(background.jpg);
        background-size:cover;
        background-repeat:no-repeat;
        background-position:center;
        position:absolute;
        top:0;
        left:0;
        right:0;
        bottom:-35%;
    }

    h1{
    text-align: center;
    margin-bottom: 14px;
    font-family: montserrat;
    font-weight:400;
    letter-spacing: -.02em;
    }

    div {
    background-color:#FFFFFF;
    border:1px solid gray;
    border-radius: 20px;
    width:25%;
    padding:1% 2%;
    margin-left:50%;
    margin-top:1%;
    box-shadow: 0px 10px 20px rgba(71,14,14,.15);
        position:relative;
     }


label{
  display: block;
  margin-bottom: 4px;
  color: #1e1e1e;
  font-family: montserrat;
  font-weight: 500;
  font-size: 16px;
}


input{
  display: block;
  margin-bottom: 6px;
  background: #f5f5f5;
  padding: 1% 3%;
  width: 94%;
  border:none;
  border-radius: 10px;
  font-family: "Roboto", sans-serif;
  font-size: 16px;
  font-weight: 400;
  color: #1e1e1e;
  line-height: 32px;
}


button {
  margin-top: 20px;
  width: 100%;
  background-color: #e1261d;
  color: #ffffff;
  border: 1px solid #e1261d;
  box-shadow: 0 10px 20px rgba(71,14,14,.15);
  height: 40px;
  display: flex;
  align-items: center;
  justify-content: center;
  border-radius: 12px;
  margin-bottom:4%;
  font-family: montserrat;
  font-weight: 400;
  font-size: 12px;
  line-height: 24px;
  letter-spacing: -.02em;
}
.recherche:hover {
        background-color: #c2132b;
    }

select {
  margin-bottom: 6px;
  background: #f5f5f5;
  padding: 3.5% 0%;
  width: 100%;
  border:none;
  border-radius: 10px;
  font-family: "Roboto", sans-serif;
  font-size: 16px;
  font-weight: 400;
  color: #1e1e1e;
}

iframe.services{
        position:absolute;
        left:0%;
        top:155%;

        width:100%;
        height:110%;
        overflow:scroll;


    }




</style>
<body class="background">

<div>
    <h1>Reserve maintenant</h1>
<form  method="GET" action="voyage.php">

    <label for="dep">Départ</label>
    <input type="text" id="input" placeholder="Depuis ?" name="dep" required/>
    <ul class="list"></ul>

    <label for="des">Destination</label>
    <input type="text" id="input1" placeholder="Vers ?" name="des" required />
    <ul class="list1"></ul>




    <label for="currentDate">Date de départ</label>
    <input name="currentDate" type="date" id="currentDate" required >

    <label for="passagers">Passagers</label>
    <input name="passagers" type="number" value="1" required>


    <button type="submit" class="recherche">Recherche</button>

</form>
</div>

<script src="reservation.js"></script>
<script src="current_date.js"></script>

</body>
<iframe src="services.html" class="services"  scrolling="auto" frameborder="0" name="centre"> </iframe>


</html>