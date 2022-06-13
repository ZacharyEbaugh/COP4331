
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

<button onclick= "doDeleteContact()" style = "width: 25%; height: 40px; font-size: 20px; background: linear-gradient(to right,#74b9c8,#4c98ab); border: 0px; color: white; border-radius: 5px; font-family: 'Josefin Sans', sans-serif; cursor: pointer"> CONFIRM </button>
</div>
</div>

<div class = "delPop" id = "editPop">
<div class = "delCon">
<div style = " font-family: 'Josefin Sans', sans-serif;">

  <center><form style = "width: 50%">
    <label for="first_nameEC">Contact's First Name</label> <br>
    <input type="text" id="first_nameEC" name="first_nameEC" placeholder="First Name..."> <br><br>

    <label for="last_nameEC">Contact's Last Name</label> <br>
    <input type="text" id="last_nameEC" name="last_nameEC" placeholder="Last Name..."> <br><br>

    <label for="phone_numEC">Contact's Phone Number</label> <br>
    <input type="tel" id="phone_numEC" name="phone_numEC" placeholder="Phone Number..."> <br><br>
    
    <label for="emailEC">Contact's E-mail</label> <br>
    <input type="email" id="emailEC" name="emailEC" placeholder="Email..."> <br><br>
    
    <label for="addressEC">Contact's Address</label> <br>
    <input type="text" id="addressEC" name="addressEC" placeholder="Address..."> <br><br>
<br>
<input onclick = "doEditContact()" type="submit" value = "CONFIRM " style = "width: 50%; height: 40px; font-size: 20px; background: linear-gradient(to right,#74b9c8,#4c98ab); border: 0px; color: white; border-radius: 5px; font-family: 'Josefin Sans', sans-serif; cursor: pointer">

<button onclick= "getNav()" style = "width: 50%; height: 40px; font-size: 20px; background: linear-gradient(to right,#e9344a, #f97c71); border: 0px; color: white; border-radius: 5px; font-family: 'Josefin Sans', sans-serif; cursor: pointer"> CANCEL </button>
   
</center>
</form>
</center>   
</div>
<br>
</div>
</div>



<?php
include("DB_connections.php");
session_start();

$userID = $_SESSION['id'];

if (isset($_POST['input'])) {
    
    $input = $_POST['input'];
    $input = explode(' ', $input);
    $input = ($input[0] . $input[1]);

    $query = "SELECT * FROM `contact_list` WHERE CONCAT(`first_name`, `last_name`) LIKE '{$input}%' AND `user_id` = '$userID'";    
    $result = mysqli_query($con, $query);
    if (mysqli_num_rows($result) > 0) { ?>


        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="stylesheet" href="./../css/live-search.css" />
            <title>search</title>
        </head>

        <body>
            <!-- table of contacts -->
            <table id="contacts">

                <?php
                $result = mysqli_query($con, $query);

                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        $contact_id = $row['contact_id'];
			$firstName = $row['first_name'];
                        $lastName = $row['last_name'];
                        $email = $row['email'];
			$phone_num = $row['phone_num'];
                        $address = $row['address'];
                ?>

                <tbody>
                    <tr>
                        <td><img style="width: 100px" src="https://64.media.tumblr.com/f6f345984b07c36fad0d98a149fcf547/fb078ec2c942b531-79/s2048x3072/d31315a0c864dbae0d5ce108db5aeecea0b2a8d7.pnj"></td>
                        <td><?php echo $firstName; ?></td>
                        <td><?php echo $lastName; ?></td>
                        <td><?php echo $phone_num; ?></td>
			<td><?php echo $email; ?></td>
                        <td><?php echo $address; ?></td>
			<td><button class="button" onclick="opEdit()">EDIT</button></td>
		  	<td><button class="button" onclick="remContact()">DELETE</button></td>                    </tr>
                    <?php } ?>
                </tbody>
            </table>
            <?php
                }
                } else {
                    echo "<h6 class = 'text-danger'>No results found...</h6>";
                }
    }
?>
    </body>

<script>
	function opEdit() 
    {
        $("#contacts tr").click(function(){
        $(this).addClass('selected').siblings().removeClass('selected'); 
        contact_id=$(this).find('td:nth-child(7)').html();
        contact_idEC = $(this).find('td:nth-child(7)').html();
        console.log(contact_idEC);
        });
        
        document.getElementById("editPop").style.display = "block";
    }

	function remContact()
    {
        $("#contacts tr").click(function(){
        $(this).addClass('selected').siblings().removeClass('selected'); 
        contact_id=$(this).find('td:nth-child(7)').html();
        contact_idDC = $(this).find('td:nth-child(7)').html();
        console.log(contact_idDC);
        });

        document.getElementById("remPopUp").style.display = "block";
    }

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

              window.location.href = "treehouse.php";
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

         // let contact_id = contact_idEC;
        let user_id = idCookie;
        let first_name = document.getElementById("first_nameEC").value;
        let last_name = document.getElementById("last_nameEC").value;
        let phone_num = document.getElementById("phone_numEC").value;
        let email = document.getElementById("emailEC").value;
        let address = document.getElementById("addressEC").value;
      
        console.log(idCookie);
        //console.log("pog" + contact_idEC);
        console.log(contact_id);
        console.log(contact_id);
        console.log(contact_id);
        console.log(contact_id);
        console.log(first_name);
        //document.getElementById("editContactResult").innerHTML = "";

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

                    window.location.href = "treehouse.php";
                }
            };
            xhr.send(jsonPayload);
        }
        catch(err)
        {
           //document.getElementById("editContactResult").innerHTML = err.message;
        }
    }
</script>

</html>

