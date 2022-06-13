<?php
  require('DB_connections.php');
  session_start();
?>


<!DOCTYPE html>
<html>
<head>
<title>Treehouse</title>
<link rel="stylesheet" href="./../css/treehouse.css"/>
<link rel="icon" type="image/x-icon" href="https://i.imgur.com/tssrPdc.png">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Noto+Emoji:wght@700&display=swap" rel="stylesheet">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@500&family=Noto+Emoji:wght@500;700&family=Noto+Sans+Symbols+2&family=Pacifico&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Noto+Emoji:wght@500;700&family=Noto+Sans+Symbols+2&family=Pacifico&display=swap" rel="stylesheet">

<style>
</style>
  
</head>
<body>
<div class= "bigMain" id = "mainDoc">

<div class = "delPop" id = "delPopUp">
<div class = "delCon">
<div style = "font-size: 20px; font-family: 'Josefin Sans', sans-serif;">Are you sure want to delete your profile?</div>
<br>
<button onclick= "closeDelPop()" style = "width: 25%; height: 40px; font-size: 20px; background: linear-gradient(to right,#e9344a, #f97c71); border: 0px; color: white; border-radius: 5px; font-family: 'Josefin Sans', sans-serif; cursor: pointer"> CANCEL </button>

<button onclick= "doDeleteUser()" style = "width: 25%; height: 40px; font-size: 20px; background: linear-gradient(to right,#74b9c8,#4c98ab); border: 0px; color: white; border-radius: 5px; font-family: 'Josefin Sans', sans-serif; cursor: pointer"> CONFIRM </button>
<span id="deleteUserResult"></span>
</div>
</div>

<div class = "delPop" id = "remPopUp">
<div class = "delCon">
<div style = "font-size: 20px; font-family: 'Josefin Sans', sans-serif;">Are you sure want to delete this contact?</div>
<br>
<button onclick= "closeRemPop()" style = "width: 25%; height: 40px; font-size: 20px; background: linear-gradient(to right,#e9344a, #f97c71); border: 0px; color: white; border-radius: 5px; font-family: 'Josefin Sans', sans-serif; cursor: pointer"> CANCEL </button>

<button onclick= "getNav()" style = "width: 25%; height: 40px; font-size: 20px; background: linear-gradient(to right,#74b9c8,#4c98ab); border: 0px; color: white; border-radius: 5px; font-family: 'Josefin Sans', sans-serif; cursor: pointer"> CONFIRM </button>
</div>
</div>

<div class = "delPop" id = "editPop">
<div class = "delCon">
<div style = " font-family: 'Josefin Sans', sans-serif;">

  <center><form style = "width: 50%">
    <label for="first_nameEC">First Name</label> <br>
    <input type="text" id="first_nameEC" name="first_nameEC" placeholder="Your first name.."> <br><br>

    <label for="last_nameEC">Last Name</label> <br>
    <input type="text" id="last_nameEC" name="last_nameEC" placeholder="Your last name.."> <br><br>

    <label for="phone_numEC">Phone number</label> <br>
    <input type="tel" id="phone_numEC" name="phone_numEC" placeholder="Your phone number.."> <br><br>
    
    <label for="emailEC">E-mail</label> <br>
    <input type="email" id="emailEC" name="emailEC" placeholder="Your email.."> <br><br>
    
    <label for="addressEC">Address</label> <br>
    <input type="text" id="addressEC" name="addressEC" placeholder="Your address.."> <br><br>
<br>
<input onclick = "editButton()" type="submit" value = "CONFIRM " style = "width: 25%; height: 40px; font-size: 20px; background: linear-gradient(to right,#74b9c8,#4c98ab); border: 0px; color: white; border-radius: 5px; font-family: 'Josefin Sans', sans-serif;">

 <button onclick= "getNav()" style = "width: 25%; height: 40px; font-size: 20px; background: linear-gradient(to right,#e9344a, #f97c71); border: 0px; color: white; border-radius: 5px; font-family: 'Josefin Sans', sans-serif;"> CANCEL </button>
   
</center>
</form>
</center>   
</div>
<br>
</div>
</div>

<div class="row">
  
  <div class="column0">
  </div>
  
  <div class="column1" >
  
  <div class = "sidenav">
  </div>
  
  <div class = "sidenav2">
  </div>
  
  <div class = "sidenav1" id= "sidenav1">
  <left>
  <h style = "font-family: 'Pacifico', cursive; text-align: center; font-size: 4vw; width: 50%; user-select: none;"> &nbspTreehouse</h>
  
  
  <div class="searchBar">
    <input type="text" class="form-control" id="live-search" autocomplete="off" placeholder="Search Contacts" style="border: 0 none; height: 25px">
  </div>
  <button class = "button" onclick= "getProfile()" style="width: 50%; padding: 3px 0px">Update Profile</button>
  <br>
  <button class = "button" onclick= "getForm()" style="width: 50%">Add New Contact</button>
  <br>
  <button class = "button" onclick = "doLogout()" style="width: 50%">Logout</button>
  </left>
  </div>
  
  <div class = "sidenavA" id= "sidenavA">
  <left>
    <h style = "font-family: 'Pacifico', cursive; text-align: center; font-size: 4vw; width: 50%; user-select: none;"> &nbspTreehouse</h>
    
  <div class = "formCon" id = "addCon" style = "font-family: 'Noto Emoji', sans-serif; font-size: 15px">
  <br>
 <p style = "text-transform:uppercase;" > <b>Add a new contact</b> </p>
 
  <center><img style = "width: 100px" src = "https://64.media.tumblr.com/508b7edacc0a950d1273f0466499accf/88f42c71fa566fc3-fa/s2048x3072/897db133d51bc7617aa9cb909650cbb6fd11b3f6.pnj"> </center>

  <form onsubmit="return false">
    <label for="first_nameAC">First Name</label>
    <input type="text" id="first_nameAC" name="first_nameAC" placeholder="First name...">

    <label for="last_nameAC">Last Name</label>
    <input type="text" id="last_nameAC" name="last_nameAC" placeholder="Last name...">

    <label for="phone_numAC">Phone number</label>
    <input type="tel" id="phone_numAC" name="phone_numAC" placeholder="Phone number..">
    
    <label for="emailAC">E-mail</label>
    <input type="email" id="emailAC" name="emailAC" placeholder="Contact's email..">
    
    <label for="addressAC">Address</label>
    <input type="text" id="addressAC" name="addressAC" placeholder="Contact's address..">
  
    <center>  <input type="submit" onclick = "doAddContact()" value="SAVE" style = "width: 100%; font-family: 'Noto Emoji', sans-serif;" >
    <span id="addContactResult"></span>

</center>
  </form>   
     <center>
<button onclick= "getNav()" style = "width: 100%; font-size: 20px; background: linear-gradient(to right,#e9344a, #f97c71); border: 0px; color: white; border-radius: 5px"> ✖ </button>
   </center>
  </left>
  </div>
  
  <div class = "formCon" id = "profile" style = "font-family: 'Noto Emoji', sans-serif; font-size: 15px">
 <p style = "text-transform:uppercase;" > <b>Update Profile</b> </p>
 
  <center><img style = "width: 100px" src = "https://64.media.tumblr.com/508b7edacc0a950d1273f0466499accf/88f42c71fa566fc3-fa/s2048x3072/897db133d51bc7617aa9cb909650cbb6fd11b3f6.pnj"> </center>

  <form onsubmit="return false">
    <label for="usernameUP">Username</label>
    <input type="text" id="usernameUP" name="usernameUP" placeholder="Username..."> 
   
    <label for="passwordUP">Password</label>
    <input type="text" id="passwordUP" name="passwordUP" placeholder="Password...">
    
    <label for="first_nameUP">First Name</label>
    <input type="text" id="first_nameUP" name="first_nameUP" placeholder="First name...">

    <label for="last_nameUP">Last Name</label>
    <input type="text" id="last_nameUP" name="last_nameUP" placeholder="Last name..">

    <label for="phone_numUP">Phone Number</label>
    <input type="tel" id="phone_numUP" name="phone_numUP" placeholder="Phone number..">
    
    <label for="emailUP">E-mail</label>
    <input type="email" id="emailUP" name="emailUP" placeholder="Email..">
    
    <label for="addressUP">Address</label>
    <input type="text" id="addressUP" name="addressUP" placeholder="Address..">
  
    <center>  <input type="submit" onclick = "doEditUser()" value="SAVE" style = "width: 100%; font-family: 'Noto Emoji', sans-serif;" >
    <span id="editUserResult"></span>
   

   
</center>
  </form>   
     <center>
<button onclick= "getNav()" style = "width: 100%; font-size: 20px; background: linear-gradient(to right,#e9344a, #f97c71); border: 0px; color: white; border-radius: 5px"> ✖ </button>
<br>
<br>
   <button onclick = "delProfile()" style = "background-color: transparent; color: red; border: 0px; cursor: pointer;">delete profile</button>
   </center>
  </left>
  </div>
  </div>
  </div>
  <div class="column2" >
    <br>
    
 <br>
  <!-- table of contacts -->
  <div class = "">

</div>
  
<script type="text/javascript">
  readCookie();
  console.log(idCookie);

  function readCookie()
  {
    idCookie = -1;
    let data = document.cookie;
    let splits = data.split(";");
    for(var i = 0; i < splits.length; i++) 
    {
      let thisOne = splits[i].trim();
      let tokens = thisOne.split("=");
      
      if( tokens[0] == "idCookie" )
      {
        idCookie = parseInt( tokens[1].trim() );
      }
    }
    
    if( idCookie < 0 )
    {
      window.location.href = "index.html";
    }
    else
    {
      // document.getElementById("username").innerHTML = "Logged in as " + firstName + " " + lastName;
    }
  }
</script>

	<script>
		let firstNameTest = "";
	</script>


<?php
$username = $_SESSION['username'];

$queryUserID = "SELECT * FROM `user_info` WHERE `username` = '$username'";
$userIDResult = mysqli_query($con, $queryUserID);
$userRow = mysqli_fetch_assoc($userIDResult);
$userID = $userRow['id'];

$_SESSION['id'] = $userID;

$query = "SELECT * FROM `contact_list` WHERE `user_id` = '$userID'";

$result = mysqli_query($con, $query);
if (mysqli_num_rows($result) > 0) { ?>
  <!-- table of contacts -->
  <div class="displayResult">
      <table id="contacts">
          <?php
          $result = mysqli_query($con, $query);

          if (mysqli_num_rows($result) > 0) {
              while ($row = mysqli_fetch_assoc($result)) {
		  $contact_id = $row['contact_id'];
                  $username = $row['username'];
                  $password = $row['password'];
                  $firstName = $row['first_name'];
                  $lastName = $row['last_name'];
		  $phone_num = $row['phone_num'];
                  $email = $row['email'];
                  $address = $row['address'];
          ?>
          <tbody>
              <tr>
                  <td><img style="width: 100px" src="https://64.media.tumblr.com/f6f345984b07c36fad0d98a149fcf547/fb078ec2c942b531-79/s2048x3072/d31315a0c864dbae0d5ce108db5aeecea0b2a8d7.pnj"></td>
                  <td><?php echo $firstName;?></td>
                  <td><?php echo $lastName; ?></td>
                  <td><?php echo $email; ?></td>
		  <td><?php echo $phone_num; ?></td>
                  <td><?php echo $address; ?></td>
                  <td style="Display:none"><?php echo $contact_id; ?></td>
		  <td><button class="button" onclick="opEdit()">EDIT</button></td>
		  <td><button class="button" onclick="deleteButton()">DELETE</button></td>
              </tr>
              <?php } ?>
          </tbody>
      </table>
      <?php
          }
          } else {
              echo "<h6 class = 'text-danger'>No contacts added yet</h6>";
          }
      ?>
  </div>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script>
    $(document).ready(function() {
      $("#live-search").keyup(function() {
        var input = $(this).val();
        // alert(input);
        if (input != " ") {
          $.ajax({
            url: "./API/live-search.php",
            method: "POST",
            data: {
              input: input
            },

            success: function(data) {
              $(".displayResult").html(data);
            },
          });
        } else {
          // $(".displayResult").css("display", "none");
        }
      })
    })
  </script>
      </tbody>
    </table>

  <div class = "">

</div>
  <!-- end table of contacts -->
	<script>
	// var firstNameVal = "";	
	function doDeleteContact()
  { 
    
    // contact_id = contact_idDC;
    
    console.log(contact_id);
    //document.getElementById("deleteContactResult").innerHTML = "";

    let tmp = {contact_id:contact_id};

    var jsonPayload = JSON.stringify( tmp );
    
    let url = 'http://cop4331-8.xyz/API/DeleteContact.php';

    let xhr = new XMLHttpRequest();
    xhr.open("POST", url, true);
    xhr.setRequestHeader("Content-type", "application/json; charset=UTF-8");
    try
    {
      xhr.onreadystatechange = function() 
      {
        if (this.readyState == 4 && this.status == 200) 
        {
          // let jsonObject = JSON.parse( xhr.responseText );
          
          // if( userId < 1 )
          // {   
          //   document.getElementById("deleteContactResult").innerHTML = "User/Password combination incorrect";
          //   return;
          // }

          //window.location.href = "treehouse.php";
        }
      };
      xhr.send(jsonPayload);
    }
    catch(err)
    {
      //document.getElementById("deleteContactResult").innerHTML = err.message;
    }
  }

function doEditContact()
{ 
  readCookie();

  let contact_id = contact_idEC;
  let user_id = idCookie;
  let first_name = document.getElementById("first_nameEC").value;
  let last_name = document.getElementById("last_nameEC").value;
  let phone_num = document.getElementById("phone_numEC").value;
  let email = document.getElementById("emailEC").value;
  let address = document.getElementById("addressEC").value;
  
  //console.log(contact_id);
  console.log(first_name);
  document.getElementById("editContactResult").innerHTML = "";

  let tmp = {contact_id:contact_id,user_id:user_id,first_name:first_name,last_name:last_name,phone_num:phone_num,email:email,address:address};

  var jsonPayload = JSON.stringify( tmp );
  
  let url = 'http://cop4331-8.xyz/API/EditContact.php';

  let xhr = new XMLHttpRequest();
  xhr.open("POST", url, true);
  xhr.setRequestHeader("Content-type", "application/json; charset=UTF-8");
  try
  {
    xhr.onreadystatechange = function() 
    {
      if (this.readyState == 4 && this.status == 200) 
      {
        // let jsonObject = JSON.parse( xhr.responseText );

        // if( userId < 1 )
        // {   
        //   document.getElementById("editContactResult").innerHTML = "User/Password combination incorrect";
        //   return;
        // }

        //window.location.href = "treehouse.php";
      }
    };
    xhr.send(jsonPayload);
  }
  catch(err)
  {
    document.getElementById("editContactResult").innerHTML = err.message;
  }
}

  function readCookie()
{
  idCookie = -1;
  let data = document.cookie;
  let splits = data.split(";");
  for(var i = 0; i < splits.length; i++) 
  {
    let thisOne = splits[i].trim();
    let tokens = thisOne.split("=");
    
    if( tokens[0] == "idCookie" )
    {
      idCookie = parseInt( tokens[1].trim() );
    }
  }
  
  if( idCookie < 0 )
  {
    window.location.href = "index.html";
  }
  else
  {
    // document.getElementById("username").innerHTML = "Logged in as " + firstName + " " + lastName;
  }
}

	function editButton(){
		$("#contacts tr").click(function(){
    $(this).addClass('selected').siblings().removeClass('selected'); 
    contact_id=$(this).find('td:nth-child(7)').html();
		contact_idEC = contact_id;
		console.log(contact_idEC);
    doEditContact();
    });
	}

	function deleteButton(){
		$("#contacts tr").click(function(){
   	$(this).addClass('selected').siblings().removeClass('selected');    
   	firstName =$(this).find('td:nth-child(2)').html();
		lastName =$(this).find('td:nth-child(3)').html();
		email =$(this).find('td:nth-child(4)').html();
		phone_num =$(this).find('td:nth-child(5)').html();
		address =$(this).find('td:nth-child(6)').html();
		contact_id=$(this).find('td:nth-child(7)').html();
		contact_idDC = contact_id;
   	console.log("First Name: " + firstName + "\nLast Name: " + lastName + "\nEmail: " + email + "\nAddress: " + address + "\nPhone Number: " + phone_num + "\ncontact_id: " + contact_id);
    doDeleteContact();   
		});
	}
	</script>

  </div>
  <div class="column3" >
  </div>
</div>
</div>

<div class = "mainNav">
</div>



<script>


function openNav() {
  document.getElementById("mySidenav").style.width = "100%";
 document.getElementById("mainDoc").style.WebkitAnimationName = "transOut";
}

function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
  document.getElementById("mainDoc").style.WebkitAnimationName = "transOut";
  document.getElementById("mainDoc").style.display = "inline";
}

function signFunction() {
  var x = document.getElementById("log");
  var y = document.getElementById("sign");
  if (x.style.display === "none") {
    x.style.display = "block";
  } else {
    x.style.display = "none";
    y.style.display = "block";
  }
}
function logFunction() {
  var x = document.getElementById("sign");
  var y = document.getElementById("log");
  if (x.style.display === "none") {
    x.style.display = "block";
  } else {
    x.style.display = "none";
    y.style.display = "block";
  }
}
function getForm() {
  var x = document.getElementById("sidenav1");
  var y = document.getElementById("sidenavA");
  var z = document.getElementById("addCon");
  var v = document.getElementById("profile");
  if (x.style.display === "none") {
    x.style.display = "block";
  } else {
    y.style.display = "block";
    z.style.display = "block";
    x.style.display = "none";
    v.style.display = "none";
   
  }
}

function getProfile() {
  var x = document.getElementById("sidenav1");
  var y = document.getElementById("sidenavA");
  var z = document.getElementById("addCon");
  var v = document.getElementById("profile");
  if (x.style.display === "none") {
    x.style.display = "block";
  } else {
      
    z.style.display = "none";
    x.style.display = "none";
    y.style.display = "block";
    v.style.display = "block";
   
  }
  var test = "Johnny";
  document.getElementById("first_namePro").value = test;
}

function getNav() {
  var x = document.getElementById("sidenav1");
  var y = document.getElementById("sidenavA");
  var z = document.getElementById("formCon");
  if (y.style.display === "none") {
    y.style.display = "block";
  } else {
    y.style.display = "none";
    x.style.display = "block";
  }
}

function makeEdit(){
 document.getElementById("dontAllow").style.display = "inline";
 document.getElementById("contacts").setAttribute("contenteditable", "false");
 document.getElementById("allow").style.display = "none";
 
}
function makeNoEdit(){
 document.getElementById("allow").style.display = "inline";
 document.getElementById("contacts").setAttribute("contenteditable", "true");
 document.getElementById("dontAllow").style.display = "none";
}

function closeDelPop(){
        document.getElementById("delPopUp").style.display = "none";
    }
    
function delProfile() {
        document.getElementById("delPopUp").style.display = "block";
    }
    
function closeRemPop(){
        document.getElementById("remPopUp").style.display = "none";
    }
    
function remContact() {
        document.getElementById("remPopUp").style.display = "block";
    }
function addContactToTable() {
  var table = document.getElementById("contacts");
  var row = table.insertRow(0);
  var cell1 = row.insertCell(0);
  var cell2 = row.insertCell(1);
  cell1.innerHTML = "NEW CELL1";
  cell2.innerHTML = "NEW CELL2";
}

function closeEdit() {
        document.getElementById("editPop").style.display = "none";
    }
function opEdit() {
        document.getElementById("editPop").style.display = "block";
    }

function doEditUser()
{ 
  readCookie();

  let id = idCookie;
  let username = document.getElementById("usernameUP").value;
  let password = document.getElementById("passwordUP").value;
  let first_name = document.getElementById("first_nameUP").value;
  let last_name = document.getElementById("last_nameUP").value;
  let phone_num = document.getElementById("phone_numUP").value;
  let email = document.getElementById("emailUP").value;
  let address = document.getElementById("addressUP").value;
  
  document.getElementById("editUserResult").innerHTML = "";

  let tmp = {id:id,username:username,password:password,first_name:first_name,last_name:last_name,phone_num:phone_num,email:email,address:address};

  var jsonPayload = JSON.stringify( tmp );
  
  let url = 'http://cop4331-8.xyz/API/EditUser.php';

  let xhr = new XMLHttpRequest();
  xhr.open("POST", url, true);
  xhr.setRequestHeader("Content-type", "application/json; charset=UTF-8");
  try
  {
    xhr.onreadystatechange = function() 
    {
      if (this.readyState == 4 && this.status == 200) 
      {
        // let jsonObject = JSON.parse( xhr.responseText );
        
        // if( userId < 1 )
        // {   
        //   document.getElementById("editUserResult").innerHTML = "User/Password combination incorrect";
        //   return;
        // }

        window.location.href = "treehouse.php";
      }
    };
    xhr.send(jsonPayload);
  }
  catch(err)
  {
    document.getElementById("editUserResult").innerHTML = err.message;
  }
}

function doDeleteUser()
{ 
  readCookie();
  
  let id = idCookie;
  
  document.getElementById("deleteUserResult").innerHTML = "";

  let tmp = {id:id};

  var jsonPayload = JSON.stringify( tmp );
  
  let url = 'http://cop4331-8.xyz/API/DeleteUser.php';

  let xhr = new XMLHttpRequest();
  xhr.open("POST", url, true);
  xhr.setRequestHeader("Content-type", "application/json; charset=UTF-8");
  try
  {
    xhr.onreadystatechange = function() 
    {
      if (this.readyState == 4 && this.status == 200) 
      {
        //let jsonObject = JSON.parse( xhr.responseText );
        
        // if( userId < 1 )
        // {   
        //   document.getElementById("deleteUserResult").innerHTML = "User/Password combination incorrect";
        //   return;
        // }

        window.location.href = "index.html";
      }
    };
    xhr.send(jsonPayload);
  }
  catch(err)
  {
    document.getElementById("deleteUserResult").innerHTML = err.message;
  }
}

function doAddContact()
{ 
  readCookie();

  let user_id = idCookie;
  let first_name = document.getElementById("first_nameAC").value;
  let last_name = document.getElementById("last_nameAC").value;
  let phone_num = document.getElementById("phone_numAC").value;
  let email = document.getElementById("emailAC").value;
  let address = document.getElementById("addressAC").value;
  
  document.getElementById("addContactResult").innerHTML = "";

  let tmp = {user_id:user_id,first_name:first_name,last_name:last_name,phone_num:phone_num,email:email,address:address};

  var jsonPayload = JSON.stringify( tmp );
  
  let url = 'http://cop4331-8.xyz/API/AddContact.php';

  let xhr = new XMLHttpRequest();
  xhr.open("POST", url, true);
  xhr.setRequestHeader("Content-type", "application/json; charset=UTF-8");
  try
  {
    xhr.onreadystatechange = function() 
    {
      if (this.readyState == 4 && this.status == 200) 
      {
        // let jsonObject = JSON.parse( xhr.responseText );
        
        // if( userId < 1 )
        // {   
        //   document.getElementById("addContactResult").innerHTML = "User/Password combination incorrect";
        //   return;
        // }

        window.location.href = "treehouse.php";
      }
    };
    xhr.send(jsonPayload);
  }
  catch(err)
  {
    document.getElementById("addContactResult").innerHTML = err.message;
  }
}

function doLogout()
{
  idCookie = 0;
  // firstName = "";
  // lastName = "";
  document.cookie = "idCookie= ; expires = Thu, 01 Jan 1970 00:00:00 GMT";
  window.location.href = "index.html";
}

function readCookie()
{
  idCookie = -1;
  let data = document.cookie;
  let splits = data.split(";");
  for(var i = 0; i < splits.length; i++) 
  {
    let thisOne = splits[i].trim();
    let tokens = thisOne.split("=");
    
    if( tokens[0] == "idCookie" )
    {
      idCookie = parseInt( tokens[1].trim() );
    }
  }
  
  if( idCookie < 0 )
  {
    window.location.href = "index.html";
  }
  else
  {
    // document.getElementById("username").innerHTML = "Logged in as " + firstName + " " + lastName;
  }
}
</script>
</body>
</html>