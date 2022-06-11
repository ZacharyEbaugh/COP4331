function doLogin()
{
  idCookie = 0;
  // firstName = "";
  // lastName = "";
  
  let username = document.getElementById("username").value;
  let password = document.getElementById("password").value;
  
  document.getElementById("loginResult").innerHTML = "";

  let tmp = {username:username,password:password};

  var jsonPayload = JSON.stringify( tmp );
  
  let url = 'http://cop4331-8.xyz/API/Login.php';

  let xhr = new XMLHttpRequest();
  xhr.open("POST", url, true);
  xhr.setRequestHeader("Content-type", "application/json; charset=UTF-8");
  try
  {
    xhr.onreadystatechange = function() 
    {
      if (this.readyState == 4 && this.status == 200) 
      {
        let jsonObject = JSON.parse( xhr.responseText );
        id = jsonObject.id;
    
        if( id < 1 )
        {   
          document.getElementById("loginResult").innerHTML = "User/Password combination incorrect";
          return;
        }

        saveCookie();
  
        window.location.href = "treehouse_host.php";
      }
    };
    xhr.send(jsonPayload);
  }
  catch(err)
  {
    document.getElementById("loginResult").innerHTML = err.message;
  }
}

function saveCookie()
{
  let minutes = 20;
  let date = new Date();
  date.setTime(date.getTime()+(minutes*60*1000)); 
  document.cookie = "idCookie=" + id + ";expires=" + date.toGMTString(); 
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
    window.location.href = "index.php";
  }
  else
  {
    // document.getElementById("username").innerHTML = "Logged in as " + firstName + " " + lastName;
  }
}

function doRegister()
{ 
  let username = document.getElementById("usernameA").value;
  let password = document.getElementById("passwordA").value;
  let first_name = document.getElementById("first_nameA").value;
  let last_name = document.getElementById("last_nameA").value;
  let phone_num = document.getElementById("phone_numA").value;
  let email = document.getElementById("emailA").value;
  let address = document.getElementById("addressA").value;
  
  document.getElementById("registerResult").innerHTML = "";

  let tmp = {username:username,password:password,first_name:first_name,last_name:last_name,phone_num:phone_num,email:email,address:address};

  var jsonPayload = JSON.stringify( tmp );
  
  let url = 'http://cop4331-8.xyz/API/Register.php';

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
        //   document.getElementById("registerResult").innerHTML = "User/Password combination incorrect";
        //   return;
        // }

        window.location.href = "index.php";
      }
    };
    xhr.send(jsonPayload);
  }
  catch(err)
  {
    document.getElementById("registerResult").innerHTML = err.message;
  }
}

function doEditContact()
{ 
  let contact_id = ;
  let user_id = idCookie;
  let first_name = document.getElementById("first_name").value;
  let last_name = document.getElementById("last_name").value;
  let phone_num = document.getElementById("phone_num").value;
  let email = document.getElementById("email").value;
  let address = document.getElementById("address").value;
  
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

        window.location.href = "treehouse_host.php";
      }
    };
    xhr.send(jsonPayload);
  }
  catch(err)
  {
    document.getElementById("editContactResult").innerHTML = err.message;
  }
}

function doEditUser()
{ 
  let id = idCookie;
  let username = document.getElementById("username").value;
  let password = document.getElementById("password").value;
  let first_name = document.getElementById("first_name").value;
  let last_name = document.getElementById("last_name").value;
  let phone_num = document.getElementById("phone_num").value;
  let email = document.getElementById("email").value;
  let address = document.getElementById("address").value;
  
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

        window.location.href = "treehouse_host.php";
      }
    };
    xhr.send(jsonPayload);
  }
  catch(err)
  {
    document.getElementById("editUserResult").innerHTML = err.message;
  }
}

function doAddContact()
{ 
  let user_id = idCookie;
  let first_name = document.getElementById("first_name").value;
  let last_name = document.getElementById("last_name").value;
  let phone_num = document.getElementById("phone_num").value;
  let email = document.getElementById("email").value;
  let address = document.getElementById("address").value;
  
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

        window.location.href = "treehouse_host.php";
      }
    };
    xhr.send(jsonPayload);
  }
  catch(err)
  {
    document.getElementById("addContactResult").innerHTML = err.message;
  }
}

function doDeleteUser()
{ 
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

        window.location.href = "index.php";
      }
    };
    xhr.send(jsonPayload);
  }
  catch(err)
  {
    document.getElementById("deleteUserResult").innerHTML = err.message;
  }
}

function doDeleteContact()
{ 
  let contact_id = ;
  let user_id = idCookie;
  
  document.getElementById("deleteContactResult").innerHTML = "";

  let tmp = {contact_id:contact_id,user_id:user_id};

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

        window.location.href = "treehouse_host.php";
      }
    };
    xhr.send(jsonPayload);
  }
  catch(err)
  {
    document.getElementById("deleteContactResult").innerHTML = err.message;
  }
}

function doGetUserInfo()
{ 
  id = idCookie;
  
  document.getElementById("getUserInfoResult").innerHTML = "";

  let tmp = {id:id};

  var jsonPayload = JSON.stringify( tmp );
  
  let url = 'http://cop4331-8.xyz/API/GetUserInfo.php';

  let xhr = new XMLHttpRequest();
  xhr.open("POST", url, true);
  xhr.setRequestHeader("Content-type", "application/json; charset=UTF-8");
  try
  {
    xhr.onreadystatechange = function() 
    {
      if (this.readyState == 4 && this.status == 200) 
      {
        let jsonObject = JSON.parse( xhr.responseText );
    
        // if( userId < 1 )
        // {   
        //   document.getElementById("getUserInfoResult").innerHTML = "User/Password combination incorrect";
        //   return;
        // }

        // Use the inneHTML method to display the names, we can show: innerHTML = variable

        username_Cur = jsonObject.username;
        password_Cur = jsonObject.password;
        first_name_Cur = jsonObject.first_name;
        last_name_Cur = jsonObject.last_name;
        phone_num_Cur = jsonObject.phone_num;
        email_Cur = jsonObject.email;
        address_Cur = jsonObject.address;
  
       window.location.href = "treehouse_host.php";
      }
    };
    xhr.send(jsonPayload);
  }
  catch(err)
  {
    document.getElementById("getUserInfoResult").innerHTML = err.message;
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

<script type="text/javascript">
document.addEventListener('DOMContentLoaded', function() 
{
  readCookie();
}, false);
</script>