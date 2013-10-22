<?php

class InitExtension extends CConsoleCommand
{
    /**
     * Run the main command method
     * @param array     
     */
    public function run($args)
    {
        // prepare some vars
        $files      = array();
        $currentDir = dirname(__FILE__) . DIRECTORY_SEPARATOR;
        $destDir    = YiiBase::getPathOfAlias('ext.' . $args[1]) . DIRECTORY_SEPARATOR;
        
        // show debug
        echo("DEBUG: Creating extension dir...\n");
        
        // create dirs
        $this->ensureDirectory($destDir);
        $this->ensureDirectory($destDir . 'lang' . DIRECTORY_SEPARATOR);
                
        // show debug
        echo("DEBUG: Copying extension files...\n");
        
        // build file list        
        $files[] = array('source' => $currentDir . 'Upload.php', 
                         'target' => $destDir . 'Upload.php');
        
        // build lang file list
        $langs = array('ca_CA', 'cs_CS', 'de_DE', 'el_GR', 'es_ES', 'et_EE', 'fr_FR', 'he_IL', 'hr_HR', 'id_ID', 'it_IT', 'nl_NL', 'no_NO', 'pl_PL', 'pt_BR', 'ro_RO', 'ru_RU', 'ru_RU.windows-1251', 'sk_SK', 'sv_SE', 'tr_TR', 'uk_UA', 'uk_UA.windows-1251', 'vn_VN', 'xx_XX', 'zh_CN.gb-2312', 'zh_CN', 'zh_TW');
        
        foreach($langs as $lang)
        {
            $files[] = array('source' => $currentDir . 'lang' . DIRECTORY_SEPARATOR . 'class.upload.' . $lang . '.php', 
                             'target' => $destDir . 'lang' . DIRECTORY_SEPARATOR . 'class.upload.' . $lang . '.php');    
        }
        
        // copy files
        $this->copyFiles($files);        
    }
}