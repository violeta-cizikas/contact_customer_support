<?php

// nusistatomi formos kintamieji
$name = $email = $phoneNumber = $department = $subject = $comment = '';
$nameErr = $emailErr = $phoneNumberErr = $departmentErr = $subjectErr = $commentErr = '';
$showSuccess = false;

// forma isiusta
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // forma buvo issiusta su POST metodu 
    // galima pradeti formos validacija
    // echo "Serverio metodas yra POST";

    // name validacija =======================================
    if (empty($_POST['name'])) {
        // klaida
        $nameErr = 'Prašome įvesti vardą';
        // return;
    } else {
        // input uzpildytas
        $name = cleanInput($_POST['name']);
        // patikrinti ar ivesta reiksme yra, tik raides ir tarpai
        $pattern = '/^[A-Za-z\x{00C0}-\x{00FF}][A-Za-z\x{00C0}-\x{00FF}\'\-]+([\ A-Za-z\x{00C0}-\x{00FF}][A-Za-z\x{00C0}-\x{00FF}\'\-]+)*/u';
		// ^[a-zA-Z-' ]*$ - primityvus tikrinimas (naudoti tuo atveju, pvz., jei reikia, tik lotynisku raidziu)
        if (!preg_match($pattern, $name)) {
            $nameErr = "Prašome įvesti, tik raides ir tarpus";
        }
    }

    // email & phone validacija =======================================
    $phoneNumber = cleanInput($_POST['phoneNumber']);
    $email = cleanInput($_POST['email']);
    if (empty($phoneNumber) && empty($email)){
    	$emailErr = 'Prašome įvesti elektroninio pašto adresą';
    	$phoneNumberErr = 'Prašome įvesti telefono numerį';
    } else if (empty($_POST['email'])) {
        // $emailErr = 'Prašome įvesti elektroninio pašto adresą';
        //if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i", $website))
        if (!preg_match("/^[0-9+]*$/", $phoneNumber)) { 
            $phoneNumberErr = 'Prašome patikrinti ar teisingai įvedėte telefono numerį';
        }
    } else {     
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = 'Prašome patikrinti ar teisingai įvedėte elektroninio pašto adresą';
        }
    }

    // department validacija =======================================
    if (empty($_POST['department'])) {
        $departmentErr = 'Prašome pažymėti vieną variantą';
    } else {
        $department = cleanInput($_POST['department']);
    }

    // subject validacija =======================================
    if (empty($_POST['subject'])) {
        $subjectErr = 'Prašome pažymėti vieną variantą';
    } else {
        $subject = cleanInput($_POST['subject']);
    }
    // comment validacija =======================================
    if (empty($_POST['comment'])) {
        $commentErr = 'Prašome įrašyti komentarą';
    } else {
    	$comment = cleanInput($_POST['comment']);
    	if(strlen($_POST['comment']) >= 50) {
    		$commentErr = 'Per ilgas komentaras';
   		}     
    }

    // pasitikrinti ar yra klaidu
    // jei nera tada galim nukeripti vartotoja i sekmes psl
    if (empty($nameErr) && empty($emailErr) && empty($phoneNumberErr) && empty($departmentErr) && empty($subjectErr) && empty($commentErr)) {
        // klaidu nera
        $showSuccess = true;
    }

} // if post end

// helper functions
function cleanInput($inputText)
{
    // pries XSS atack <script>alert('hello')</script>
    $cleanName = htmlspecialchars($inputText);
    // pasalinti tustiems tarpams is abieju pusiu
    $trimmedCleanedText = trim($cleanName);
    return $trimmedCleanedText;
}

