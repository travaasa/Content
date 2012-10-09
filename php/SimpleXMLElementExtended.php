<?php
class SimpleXMLElementExtended extends SimpleXMLElement
{
	/**
	 * Override asXML()
	 */
	public function asXML($replacementAry=null)
	{
		$level = 0;
	
		$string = parent::asXML();
		
		if (isset($replacementAry))
		{
			$string = SimpleXMLElementExtended::replacer($replacementAry, $string);
		}
		
        /**
         * put each element on it's own line
         */
        $string = preg_replace("/>\s*</",">\n<",$string);
		
        /**
         * each element to own array
         */
        $xmlArray = explode("\n",$string);

        /**
         * holds indentation
         */
        $currIndent = 0;

        /**
         * set xml element first by shifting of initial element
         */
        $string = array_shift($xmlArray) . "\n";

        foreach($xmlArray as $element) {
            /** find open only tags... add name to stack, and print to string
             * increment currIndent
             */

            if (preg_match('/^<([\w])+[^>\/]*>$/U',$element)) {
                $string .=  str_repeat(' ', $currIndent) . $element . "\n";
                $currIndent += $level;
            }

            /**
             * find standalone closures, decrement currindent, print to string
             */
            elseif ( preg_match('/^<\/.+>$/',$element)) {
                $currIndent -= $level;
                $string .=  str_repeat(' ', $currIndent) . $element . "\n";
            }
            /**
             * find open/closed tags on the same line print to string
             */
            else {
                $string .=  str_repeat(' ', $currIndent) . $element . "\n";
            }
        }

        return $string; 
    }    
	
	public static function replacer($replacementAry, $str)
	{
		foreach($replacementAry as $key => $val)
		{
			$str = str_replace($key, $val, $str);
		}
		
		return $str;
	}
}
?>