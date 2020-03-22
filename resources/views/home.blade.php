
    <?php
    $user = auth()->user();
    switch (true) {
    case $user->hasAnyRole(['admin']) :{ ?>
    @include('admin-home')
    <?php }  break;
    case $user->hasAnyRole(['govt']) :{ ?>
    @include('govt-home')
    <?php }  break;
    case $user->hasAnyRole(['agency']) :{ ?>
    @include('agency-home')
    <?php }  break;

    }


    ?>
