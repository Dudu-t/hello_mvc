<?php

class homeControl
{
    public function showPage()
    {
        require_once 'App/views/homePage.php';
        new views\homePage();
    }
}
