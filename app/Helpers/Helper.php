<?php
    define ('PAGINATION_COUNT', 15);

    function folderName()
    {
        return app()->getLocale() == 'ar'? 'css-rtl':'css';
    }
    
    function uploadImage($folder,$image){
        $image->store('/', $folder);
        $filename = $image->hashName();
        return  $filename;
     }
    