<?php
/* Template Name: contact us*/
  //response generation function

  $response = "";

  //function to generate response
  function my_contact_form_generate_response($type, $message){

    global $response;

    if($type == "success") $response = "<div class='success'>{$message}</div>";
    else $response = "<div class='text-error'>{$message}</div>";

  }

  //response messages
  $not_human       = "Human verification incorrect.";
  $missing_content = "Please supply all information.";
  $email_invalid   = "Email Address Invalid.";
  $message_unsent  = "Message was not sent. Try Again.";
  $message_sent    = "Thanks! Your message has been sent.";

  //user posted variables
  $name = $_POST['message_name'];
  $email = $_POST['message_email'];
  $message = $_POST['message_text'];
  $human = $_POST['message_human'];

  //php mailer variables
  $to = 'simonzhang@saintsrobotics.com';
  $subject = "Someone sent a message from ".get_bloginfo('name');
  $headers = 'From: '. $email . "\r\n" .
    'Reply-To: ' . $email . "\r\n";

  if(!$human == 0){
    if($human != 2) my_contact_form_generate_response("error", $not_human); //not human!
    else {

      //validate email
      if(!filter_var($email, FILTER_VALIDATE_EMAIL))
        my_contact_form_generate_response("error", $email_invalid);
      else //email is valid
      {
        //validate presence of name and message
        if(empty($name) || empty($message)){
          my_contact_form_generate_response("error", $missing_content);
        }
        else //ready to go!
        {
          $sent = wp_mail($to, $subject, strip_tags($message), $headers);
          if($sent) my_contact_form_generate_response("success", $message_sent); //message sent!
          else my_contact_form_generate_response("error", $message_unsent); //message wasn't sent
        }
      }
    }
  }
  else if ($_POST['submitted']) my_contact_form_generate_response("error", $missing_content);

?>

<?php get_header(); ?>

  <div id="primary" class="site-content">
    <div id="content" role="main">

      <?php while ( have_posts() ) : the_post(); ?>

          <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

            <div class="container-small" data-aos="fade">
		<?php the_title( '<h1 class="text-huge page-title">', '</h1>' ); ?>
		</div>

            <div class="entry-content" data-aos="fade">
               <div class="container-medium">
              <?php the_content(); ?>
              </div>
              <style type="text/css">
             
                .success{
                  padding: 5px 9px;
                  border: 1px solid green;
                  color: green;
                  border-radius: 3px;
                }

               
              </style>
              <div class="container-small">
              <div id="respond">
                <?php echo $response; ?>
                <form action="<?php the_permalink(); ?>" method="post">
                  
                    <div class="row">
                        <div class="col-md-12">
                            <label class="label" for="name">Name: <span>*</span></label>
                            <div class="input full-width"><input  type="text" name="message_name" value="<?php echo esc_attr($_POST['message_name']); ?>">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <label class="label" for="message_email">Email: <span>*</span> </label>
                            <div class="input full-width"><input  type="text" name="message_email" value="<?php echo esc_attr($_POST['message_email']); ?>">
                            </div>
                            </div>
                            </div>
                    <div class="row">
                        <div class="col-md-12">
                            <label class="label" for="message_text">Message: <span>*</span> </label>
                            <textarea type="text" class="textarea " name="message_text"><?php echo esc_textarea($_POST['message_text']); ?></textarea>
                         
                            
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <label class="label" stlye="color: black" for="message_human">Human Verification: <span>*</span></label>
                            <div class="input "> <input  type="text" style="width: 60px;" name="message_human"></div> + 3 = 5
                        </div>
                    </div>
                   <input  type="hidden" name="submitted" value="1">
                    <div class="row">
                        <div class="col-md-5">
                           <input class="button button-secondary" type="submit">
                          
                            
                          </div>
                    </div>
                </form>
              </div>
                </div>

            </div><!-- .entry-content -->

          </article><!-- #post -->

      <?php endwhile; // end of the loop. ?>

    </div><!-- #content -->
  </div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>