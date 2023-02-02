
<?php
if(isset($_POST['submit'])){
    $to = "pedrocondech@gmail.com"; // your email address
    $from = $_POST['email']; // sender's email address
    $name = $_POST['name'];
    $subject = "Form submission";
    $subject2 = "Copy of your form submission";
    $message = $name . " wrote the following:" . "\n\n" . $_POST['message'];
    $message2 = "Here is a copy of your message " . $name . "\n\n" . $_POST['message'];

    $headers = "From:" . $from;
    $headers2 = "From:" . $to;
    mail($to,$subject,$message,$headers);
    mail($from,$subject2,$message2,$headers2); // sends a copy of the message to the sender
    echo "Mail Sent. Thank you " . $name . ", we will contact you shortly.";
    // You can also use header('Location: thank_you.php'); to redirect to another page.
    }
?>

<div class="mt-4 text-white rounded"  style ="border-color: red;">

     
        <div class=container  >
                    <div  style="; display: flex; align-items: center; justify-content: center;  " >


                                            <form id="contactForm" style=" width: 450px; background: #9B9B9B;  padding: 10px; border-radius: 30px;">
                                                    <h1 class="display-6" style="text-align: center; color: white; font-weight: bold;">Contacto</h1>

                                                    <!-- Name input -->
                                                    <div class="mb-3">
                                                        <label class="form-label" for="name">Name</label>
                                                        <input class="form-control" id="name" name="name" type="text" placeholder="Name"  required />
                                                    </div>

                                                    <!-- Email address input -->
                                                    <div class="mb-3">
                                                        <label class="form-label" for="emailAddress">Email Address</label>
                                                        <input class="form-control" id="email" name="email" type="email" placeholder="Email Address"  required />
                    
                                                    </div>

                                                    <!-- Message input -->
                                                    <div class="mb-3">
                                                    <label class="form-label" for="message">Message</label>
                                                    <textarea class="form-control" id="message"  name="message" type="text" placeholder="Message" style="height: 10rem;" required></textarea>
                                                </div>
                                                <!-- Form submit button -->
                                                        <div class=""  style="text-align: center;">
                                                            
                                                        <button class="btn btn-primary" id="submitButton" type="submit" style="margin-bottom: 10px">Submit</button>
                                                        
                                                    </div>
                                         

                                            </form>
                               
                           
                    </div>
        </div>
<!-- SB Forms JS -->


</div>