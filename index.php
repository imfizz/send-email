<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index</title>
</head>
<body>
    <h4 class="sent-notification"></h4>
    <form id="myForm">
        <label>Name</label>
        <input type="text" id="name" placeholder="Enter name"/>

        <label>Email</label>
        <input type="text" id="email" placeholder="Enter email"/>

        <label>Subject</label>
        <input type="text" id="subject" placeholder="Enter subject"/>
        <textarea id="body" rows="5" placeholder="Type Message"></textarea>
        <button type="button" onclick="sendEmail()" value="Send an Email">Submit</button>
    </form>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" referrerpolicy="no-referrer"></script>
<script type="text/javascript">
    function sendEmail(){
      var name = $("#name");
      var email = $("#email");
      var subject = $("#subject");
      var body = $("#body");
      if(isNotEmpty(name) && isNotEmpty(email) && isNotEmpty(subject) && isNotEmpty(body)){
         $.ajax({
            url: 'sendEmail.php',
            method: 'POST',
            dataType: 'json',
            data: {
               name: name.val(),
               email: email.val(),
               subject: subject.val(),
               body: body.val()
            }, success: function(response){
               $('#myForm')[0].reset();
               $('.sent-notification').text("Message sent successfully.");
            }
         });
      }
   }

   function isNotEmpty(caller){
      if(caller.val() == ""){
         caller.css('border', '1px solid red');
         return false;
      } else {
         caller.css('border', '');
         return true;
      }
   }

</script>
</body>
</html>