<?php
  // Remplace par ton adresse email réelle
  $receiving_email_address = 'webandtech@outlook.com';

  if( file_exists($php_email_form = '../assets/vendor/php-email-form/php-email-form.php' )) {
    include( $php_email_form );
  } else {
    die( 'Unable to load the "PHP Email Form" Library!');
  }

  $contact = new PHP_Email_Form;
  $contact->ajax = true;
  
  $contact->to = $receiving_email_address;
  $contact->from_name = isset($_POST['name']) ? $_POST['name'] : '';
  $contact->from_email = isset($_POST['email']) ? $_POST['email'] : '';
  $contact->subject = isset($_POST['subject']) ? $_POST['subject'] : '';

  // Configuration SMTP
  $contact->smtp = array(
    'host' => 'smtp.yourprovider.com',  // Remplace par le serveur SMTP de ton hébergeur (OVH, Gmail, etc.)
    'username' => 'votre_email@example.com',  // Remplace par ton adresse email complète
    'password' => 'votre_mot_de_passe',  // Remplace par ton mot de passe d'email ou mot de passe d'application
    'port' => '587',  // Utilise le port SMTP correct (587 pour TLS, 465 pour SSL)
    'encryption' => 'tls'  // Utilise 'ssl' ou 'tls' selon ton fournisseur
  );

  $contact->add_message( $_POST['name'], 'From');
  $contact->add_message( $_POST['email'], 'Email');
  $contact->add_message( $_POST['message'], 'Message', 10);

  echo $contact->send();
?>
