-- MAIL --------------------------------------------
$user = User::find(1);
$email = new ConfirmRegistraion($user);
\Mail::to('ttungbmt@gmail.com')->send($email);