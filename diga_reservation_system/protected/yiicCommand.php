<?php
//$auth=Yii::app()->authManager;
$userEmail = 'Yii::app()->user->id';
$userLvl = "\$roleLvl = Yii::app()->db->createCommand()->select('user_level_id')->from('user')->where('email=\''.(".$userEmail.").'\'')->queryRow();";
$bizRule = ($userLvl . " return 3==\$roleLvl['user_level_id'];");
echo($bizRule);
//$auth->createRole('user', 'logged in student using their account', $bizRule);
?>
