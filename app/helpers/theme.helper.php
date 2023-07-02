<?php 
/**
 * Pegar os valores dos thema atual disponibilizados para rodar a parte externa (fora de alguém SESSION que um usuário possa se altenticar)
 *        
 */
function active_theme($param)
{
    // idName do atual thema
    if ($param == "idname") {
        $np_active_theme_idname = get_option("np_active_theme_idname");
        return $np_active_theme_idname ? $np_active_theme_idname : "default";
    }


    // Path absoluta do atual thema
    if ($param == "path") {
        return THEMES_PATH . "/" . active_theme("idname");   
    }


    // URI do root do atual thema
    if ($param == "url" || $param == "uri") {
        return THEMES_URL . "/" . active_theme("idname");   
    }


    // Se der erro retorno null
    return null;
}
