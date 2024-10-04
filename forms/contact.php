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
  $contact->from_name = isset($_POST['Nom']) ? $_POST['Nom'] : '';
  $contact->from_email = isset($_POST['Email']) ? $_POST['Email'] : '';
  $contact->subject = isset($_POST['Objet']) ? $_POST['Objet'] : '';

  // Configuration SMTP
  $contact->smtp = array(
    'host' => 'smtp-mail.outlook.com',  // Serveur SMTP d'Outlook
    'username' => 'webandtech@outlook.com',  // Ton adresse email complète
    'password' => 'xjwrbngmnhojdufi',  // Ton mot de passe ou mot de passe d'application
    'port' => '587',  // Port pour TLS
    'encryption' => 'tls'  // Utilisation de TLS pour la sécurité
  );

  // Ajout des messages (avec les champs en français)
  $contact->add_message( $_POST['Nom'], 'Nom');
  $contact->add_message( $_POST['Email'], 'Email');
  $contact->add_message( $_POST['Objet'], 'Objet');
  $contact->add_message( $_POST['message'], 'Message', 10);

  echo $contact->send();
?>
