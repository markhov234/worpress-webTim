<?php

if(get_option('show_on_front')==='posts'){

    include(get_home_template());
}else{
    include(get_page_template('page', 'accueil'));
}
