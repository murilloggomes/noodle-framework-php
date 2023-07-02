<?php 
/**
 * Pega a pasta do thema ativo
 * 
 * 
 * @return string 
 */
function active_theme_path()
{
    return THEMES_PATH . "/"
                       . (site_settings("theme") ? site_settings("theme") 
                                                 : "default");
}


/**
 * Pega a url do the ativo
 * 
 * @return string 
 */
function active_theme_url()
{
    return THEMES_URL . "/"
                      . (site_settings("theme") ? site_settings("theme") 
                                                : "default");
}
