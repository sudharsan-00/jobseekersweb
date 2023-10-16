const seats = document.querySelectorAll('.seat');
var userName 
var pass
var Cname
var Cid
var sb 
var date
var sL
var eL
var numSeat
var seatNum = []


seats.forEach(seat => {
  seat.addEventListener('click', () => {
    seat.classList.toggle('selected');
  });
});
function log(){

  userName =document.getElementById("username").value
  pass  = document.getElementById("pass").value
  sessionStorage.setItem("username", "Jude");
  if(userName == "Jude" && pass == "admin"){
    window.location.replace("index.html")
  }
  else{
    alert("incorrect username or password")
  }
  var username = document.getElementById("username").value;
    localStorage.setItem('username', username);

}


function BookNow(){

  Cname = document.getElementById("customer_name").value
  Cid= document.getElementById("customer_id").value
  sb = document.getElementById("bus_id").value
  date = document.getElementById("date").value
  sL = document.getElementById("start_location").value
  eL = document.getElementById("end_location").value
  numSeat = document.getElementById("numSeat").value

  if(Cname == ""){
    alert("enter customer name")
  }else if(Cid == ""){
    alert("enter customer id")
  }else if(date == ""){
    alert("enter the date")
  }else{
    window.location.replace("index.html")
    
  }
  Email.send({
    Host: "smtp.gmail.com",
    Username: "thiya.se22@bitsathy.ac.in",
    Password: "vofeusxetjletkzs",
    To: 'edwin.s.stud@gmail.com',
    From: "thiya.se22@bitsathy.ac.in",
    Subject: "Sending Email using javascript",
    Body: "Well that was easy!!",
  })
    .then(function (message) {
      alert("mail sent successfully")
    });

  for(var i=0;i<numSeat;i++){
    var TempSeat = Math.floor(Math.random()*20)
    seatNum.push(TempSeat)
  }
  
}


/*function disp(){
document.getElementById("Name").innerHTML = Cname
document.getElementById("Id").innerHTML = Cid
document.getElementById("StartLocation").innerHTML = sL
document.getElementById("EndLocation").innerHTML = eL
document.getElementById("Date").innerHTML = date
document.getElementById("Seats").innerHTML = seatNum
document.getElementById("BusName").innerHTML = sb


}
*/

