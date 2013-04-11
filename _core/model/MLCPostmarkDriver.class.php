<?php
require_once(__MLC_POSTMARK_CORE_MODEL__ . '/postmark/Postmark.php');
abstract class MLCPostmarkDriver{
	
	public static function Compose(){
		
		return Mail_Postmark::compose();
	}
	public static function ComposeFromTemplate($strTemplateLoc, $arrVars = null){
		$objMessage = self::Compose();
		$strMessageBody = self::EvaluateTemplate($strTemplateLoc, $arrVars, $objMessage);
        //$objMessage->messageHtml($strMessageBody);
		return $objMessage;
	}
	
	public static function EvaluateTemplate($strTemplateLoc, $arrVars = null, &$objMessage = null){
		
		 if ($strTemplateLoc) {
		 	foreach($arrVars as $strKey=>$strValue){
		 		$$strKey = $strValue;
		 	}
		 	$_MESSAGE = $objMessage;
		 	$_USE_HTML = true;

            // Store the Output Buffer locally
            $strAlreadyRendered = ob_get_contents();
            ob_clean();

            // Evaluate the new template
            ob_start('__MLCPostmark_EvaluateTemplate_ObHandler');
                require($strTemplateLoc);
                $strTemplateEvaluated = ob_get_contents();
            ob_end_clean();
            

            // Restore the output buffer and return evaluated template
            print($strAlreadyRendered);

            
			$objMessage = $_MESSAGE;
			if($_USE_HTML){
				$objMessage->messageHtml($strTemplateEvaluated);	
			}else{
				$objMessage->messagePlain($strTemplateEvaluated);
			}           
            return $strTemplateEvaluated;
        } else {
            return null;
        }
        
	}
	
	
}
function __MLCPostmark_EvaluateTemplate_ObHandler($strBuffer) {
    return $strBuffer;
}
?>