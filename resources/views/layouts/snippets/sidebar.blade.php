<?php
$user = auth()->user();
switch (true) {
case $user->hasAnyRole(['admin']) :{ ?>
@include('layouts.snippets.admin-sidebar')
<?php }  break;
case $user->hasAnyRole(['govt']) :{ ?>
@include('layouts.snippets.govt-sidebar')
<?php }  break;
case $user->hasAnyRole(['agency']) :{ ?>
@include('layouts.snippets.agency-sidebar')
<?php }  break;

}


?>
