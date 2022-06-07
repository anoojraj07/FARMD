<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FarmD-PostLogin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
        .header {
          overflow: hidden;
          background-color: black;
          padding: 10px 10px;
        }
        h1
        {
            top:10%;
            text-align: center;
        }
        body{
            background-image: radial-gradient(circle, #FFDEE9 0%, #B5FFFC 100%);
        }

.button-64 {
  align-items: center;
  background-image: linear-gradient(144deg,#AF40FF, #5B42F3 50%,#00DDEB);
  border: 0;
  border-radius: 8px;
  box-shadow: rgba(151, 65, 252, 0.2) 0 15px 30px -5px;
  box-sizing: border-box;
  color: #FFFFFF;
  display: flex;
  font-family: Phantomsans, sans-serif;
  font-size: 20px;
  justify-content: center;
  line-height: 1em;
  max-width: 100%;
  min-width: 140px;
  padding: 3px;
  text-decoration: none;
  user-select: none;
  -webkit-user-select: none;
  touch-action: manipulation;
  white-space: nowrap;
  cursor: pointer;
}

.button-64:active,
.button-64:hover {
  outline: 0;
}

.button-64 span {
  background-color: rgb(5, 6, 45);
  padding: 16px 24px;
  border-radius: 6px;
  width: 100%;
  height: 100%;
  transition: 300ms;
}

.button-64:hover span {
  background: none;
}

@media (min-width: 768px) {
  .button-64 {
    font-size: 24px;
    min-width: 196px;
  }
}
    </style>
    <script>
      function pop() {
      let text;
      let person = parseInt(prompt("Please enter your AdharUID:"));
      if(person== null || person=="")
      {
        text=alert("Cancelled");
      }
      else {
        window.location.href="update.php";
        document.cookie = "uid="+person;
      }
      }
      function check() {
      let text;
      let person = parseInt(prompt("Please enter your Application Number:"));
      if(person== null || person=="")
      {
        text=alert("Cancelled");
      }
      else {
        window.location.href="application_status.php";
        document.cookie = "uid="+person;
      }
      }
      function checkapp() {
      let text;
      let person = parseInt(prompt("Please enter your Application Number:"));
      if(person== null || person=="")
      {
        text=alert("Cancelled");
      }
      else {
        window.location.href="download.php";
        document.cookie = "uid="+person;
      }
      }
    </script> 
</head>
<body>
    <div class="container">
        <div class="conatiner-fluid">
          <div class="header" style="color: white;padding: 10px;font-size: 50px;"><div style="transform: translateX(435px);"><b>Welcome to FarmD</b></div></div>

            <br><br><br>
            <div class="row">
                <div class="col-sm-6">
                  <div class="card text-white bg-dark mb-3">
                      <img style="height: 390px;" src="land.jpg"></img>
                    <div class="card-body">
                      <h5 class="card-title">Updation</h5>
                      <p class="card-text">Update your land details here</p>
                      <input type="submit" class="btn btn-primary" onclick="pop()">
                    </div>
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="card text-white bg-dark mb-3">
                    <img src="subsidy.jpeg" style="height: 390px;"></img>
                    <div class="card-body">
                      <h5 class="card-title">Application</h5>
                      <p class="card-text">Apply for subsidy here</p>
                      <a href="Subsidy.html" class="btn btn-primary">Click here to apply</a>
                    </div>
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="card text-white bg-dark mb-3">
                    <img src="application_status.png" style="height: 390px;"></img>
                    <div class="card-body">
                      <h5 class="card-title">Overview</h5>
                      <p class="card-text">Check you subsidy application status</p>
                      <a href="#" class="btn btn-primary" onclick="check()">Click here</a>
                    </div>
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="card text-white bg-dark mb-3">
                    <img src="down.jpg" style="height: 390px; overflow: hidden;"></img>
                    <div class="card-body">
                      <h5 class="card-title">Download</h5>
                      <p class="card-text">Download Application Form</p>
                      <a href="#" class="btn btn-primary" onclick="checkapp()">Click here</a>
                    </div>
                  </div>
                </div>
              </div>
              </div>
        </div>

       <center><!-- HTML !-->
<button class="button-64" onclick="window.location.href='main.html';" role="button" style="width: 70px;height:60px;"><span class="text"><b>LOGOUT</b></span></button></center> <br><Br><Br>
    </div>
</body>
</html>