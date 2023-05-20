<?php
 session_start(); 
//Check whether the session variable SESS_MEMBER_ID is present or not
if (!isset($_SESSION['slogin']) || (trim($_SESSION['slogin']) == '')) { ?>
<script>
window.location = "../index.php";
</script>
<?php
}
$session_id= $_SESSION['slogin'];
$session_role = $_SESSION['srole'];
$session_semail = $_SESSION['semail'];
$session_sfirstname = $_SESSION['sfirstname'];
$session_slastname = $_SESSION['slastname'];
$session_smiddlename = $_SESSION['smiddlename'];
$session_scontact = $_SESSION['scontact'];
$session_saddress = $_SESSION['saddress'];
?>
