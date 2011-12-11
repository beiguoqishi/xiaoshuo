<?php
/**
 * Smarty plugin
 * @package Smarty
 * @subpackage plugins
 */


/**
 * Smarty cmsescape modifier plugin
 *
 * Type:     modifier<br>
 * Name:     cmsescape<br>
 * Purpose:  Escape the string according to escapement type
 * @link http://smarty.php.net/manual/en/language.modifier.escape.php
 *          escape (Smarty online manual)
 * @author   chenggang
 * @param string
 * @param string
 * @return string
 */
function smarty_modifier_cmsescape($string, $escape_string, $etc= "...")
{
    //echo "escape=$escape_string<br>";
    //echo "*****string=$string,gbk string=".var_export(iconv('utf-8','gbk',$string),true)."<br>";
    //var_dump($string);
    //var_dump(iconv('utf-8','gbk',$string));
    //echo iconv("utf-8",'gbk',$string);
    //没有escape字符
    $encode_helper = new EncodeHelper();
    if( !isset($escape_string) || $escape_string=='' ){
        return $string;
    }
    $syntax_arr = explode(':',$escape_string);
    //是否有截断语法标记xxx:length,如果有，其他语法都不处理
    $cutwordFlag = false;
    for( $j=0;$j<count($syntax_arr);$j++ ){
        if( $j!=0 ){
        	//找到 xxx:整数标示，有截取属性，忽略其他语法
        	if( preg_match( '/^\d+$/', $syntax_arr[$j]) === 1 ){ 
        		unset( $syntax_real_arr );
        		$syntax_real_arr[] = intval($syntax_arr[$j]);
        		$cutwordFlag = true;
        		break;
        	}
            $syntax_real_arr[] = $syntax_arr[$j];
        }
    }
    
    //没有任何转义，直接输出
    if( $syntax_real_arr==null || count($syntax_real_arr)==0 ){
       return $string;
    }
	//截取操作
	//echo "111string=$string<br>";
	if( $cutwordFlag === true ){
	    //echo "string=$string,length=".$syntax_real_arr[0]."<br>";
	    $string = $encode_helper->get_str_by_length($string,$syntax_real_arr[0], $etc);
	    return $string;
    }
    
	#取长度操作
	if( in_array('l', $syntax_real_arr) ){
		return strlen($string);
    }
    
    //如果有utf8&&u转义,先进行utf8转义，再进行url转义
    if( in_array('utf8', $syntax_real_arr) && in_array('u',$syntax_real_arr) ){
    	return $encode_helper->utf8_url_encode($string);
    }
    //如果有utf8并且要求识别试图字符，则先进行utf8转码，然后进行实体字符转码，再进行url转义
    if( in_array( 'utf8[entity]', $syntax_real_arr) && in_array('u',$syntax_real_arr) ){
        return $encode_helper->utf8_entity_url_encode($string);
    }
    //如果有u转义，进行urlencode转义
    if( in_array('u',$syntax_real_arr) ){
        return urlencode($string);
    }
    //h,j,x都有，与j，h相同
    if( in_array('h',$syntax_real_arr) && in_array('x',$syntax_real_arr) && in_array('j',$syntax_real_arr) ){
        return $encode_helper->js_html_encode($string);
    }
    //h,x=x
    if( (in_array('h',$syntax_real_arr) && in_array('x',$syntax_real_arr))  ){
        return $encode_helper->xml_encode($string);
    }
    //h,j
    if( in_array('h',$syntax_real_arr) && in_array('j',$syntax_real_arr) ){
        return $encode_helper->js_html_encode($string);
    }
    //x,j=j
    if( (in_array('x',$syntax_real_arr) && in_array('j',$syntax_real_arr)) ){
        return $encode_helper->js_encode($string);
    }
    //h
    if( in_array('h',$syntax_real_arr) ){
        return $encode_helper->html_encode($string);
    }	        
    //j
    if( in_array('j',$syntax_real_arr) ){
        return $encode_helper->js_encode($string);
    }
    //x
    if( in_array('x',$syntax_real_arr) ){
        return $encode_helper->xml_encode($string);
    }
    //v
    if( in_array('v',$syntax_real_arr) ){
        return $encode_helper->onclick_encode($string);
    }
    
    return $string;
}

/* vim: set expandtab: */

/**
 * 提供编码帮助函数
 * @author qiuyonggang
 *
 */
class EncodeHelper{
    public function __construct(){
    }
    /**
     * js转义，将content中js字符转义
     * ' => \'
     * " => \"
     * \ => \\
     * \n => \n
     * \r => \r
     * 其中\n转义是将换行转义成\n字符，\r转义是将回车转义成\r字符
     * @param string $content 需要转义的文本
     * @return string 转义后的文本 
     */
    public function js_encode($content){
        $content = str_replace('\\','\\\\',$content);
        $content = str_replace('\'','\\\'',$content);
        $content = str_replace('"','\\"',$content);
        $content = str_replace("\n",'\\n',$content);
        $content = str_replace("\r",'\\r',$content);
        $content = str_replace('/', '\\/', $content);
        return $content;
    }

    /**
     *  xml转义，将content中xml字符转义
     *  < => &lt;
     *  > => &gt;
     *  & => &amp;
     *  ' => &#039;
     *  " => &quot;
     *  @param string $content 需要转义的文本
     *  @return string 转义后的文本
     */
    public function xml_encode($content){
        $content = str_replace('&','&amp;',$content);
        $content = str_replace('<','&lt;',$content);
        $content = str_replace('>','&gt;',$content);
        $content = str_replace('\'','&#039;',$content);
        $content = str_replace('"','&quot;',$content);

        return $content;
    }
    /**
     * onclick转义
     * \ => \\
     * & => &amp;
     * < => &lt;
     * > => &gt;
     * ' => \&#039
     * " => \&quot;
     * \n => \n
     * \r => \r
     * / => \/
     *  @param string $content 需要转义的文本
     *  @return string 转义后的文本
     */
    public function onclick_encode( $content ){
        $content = str_replace('\\','\\\\',$content);
        $content = str_replace('&','&amp;',$content);
        $content = str_replace('<','&lt;',$content);
        $content = str_replace('>','&gt;',$content);
        $content = str_replace('\'','\\&#039;',$content);
        $content = str_replace('"','\\&quot;',$content);
        $content = str_replace("\n",'\\n',$content);
        $content = str_replace("\r",'\\r',$content);
        $content = str_replace('/', '\\/', $content);
        return $content;
    }

    /**
     *  html转义，将content中html字符转义
     *  < => &lt;
     *  > => &gt;
     *  ' => &#039;
     *  " => &quot;
     *  @param string $content 需要转义的文本
     *  @return string 转义后的文本
     */
    public function html_encode($content){
        $content = str_replace('&','&amp;',$content);
        $content = str_replace('<','&lt;',$content);
        $content = str_replace('>','&gt;',$content);
        $content = str_replace('\'','&#039;',$content);
        $content = str_replace('"','&quot;',$content);
        return $content;
    }

    /**
     *  json+html转义，转义规则如下：
     * ' => \'
     * " => \"
     * \ => \\
     * \n => \n
     * \r => \r
     *  < => &lt;
     *  > => &gt;
     * 其中\n转义是将换行转义成\n字符，\r转义是将回车转义成\r字符
     * @param string $content 需要转义的文本
     * @return string 转义后的文本
     */
    public function js_html_encode($content){
        $content = js_encode($content);
        $content = str_replace('<','&lt;',$content);
        $content = str_replace('>','&gt;',$content);
        return $content;
    }

    /**
     *  先对文本做GBK到UTF8的转码，然后做urlencode
     *  @param string $content 需要转义的文本
     *  @return string 转义后的文本
     */
    public function utf8_url_encode( $content ){
        $content = iconv( "GBK", "UTF-8", $content );
        $content = urlencode( $content );
        return $content;
    }
    
    public function utf8_entity_url_encode( $content ){
        $content = iconv( "GBK", "UTF-8", $content );
        $content = html_entity_decode( $content );
        $content = urlencode( $content );
        return $content;
    }

    /**
     * 截断文本
     * @param string $title 需要截断的title
     * @param int $len 截断的长度
     * @param string $etc 截断后附加的省略符合
     * @return string 截断后的文本
     */
    public function get_str_by_length( $title,$len,$etc='...' ){

        if( $len==null ){
            return $title;
        }
        $matches = array();
        $ret = preg_match_all('/&#[0-9]*;/',$title,$matches);
        if( $ret>0 ){
            $special_chars = $matches[0];
            for($i=0;$i<count($special_chars);$i++){
                $title = str_replace($special_chars[$i],chr(2)."$i",$title);
            }
            //lib_log("title22=$title");
        }
        if( strlen($title)<=$len ){
            if( $ret>0 ){
                for($j=0;$j<$i;$j++){
                    $title = str_replace(chr(2).$j,$special_chars[$j],$title);
                }
            }
            return $title;
        }
        $title = substr($title,0,$len);

        //lib_log("title23332=$title");
        if( $ret>0 ){
            for($j=0;$j<$i;$j++){
                $title = str_replace(chr(2).$j,$special_chars[$j],$title);
            }
        }
        $title = $this->filter_semi_char($title);
        $title.= $etc;
        return $title;

    }
    /**
     * 去除字符串最后半个汉字的函数，如果字符串最后是半个汉字，则返回去除最后半个汉字的字符串，
     * 否则返回原始字符串
     * @param string $str 原始文本
     * @return string 结果字符串
     */
    public function filter_semi_char($str){
        if( strlen($str)==0 )
        return $str;
        $ret = true;
        $i=0;
        while($i<=strlen($str)){
            $temp_str = substr($str,$i,1);
            if( !preg_match("[^\x80-\xff]","$temp_str") ){
                if( $i==strlen($str)-1 ){
                    $ret = false;
                }
                $i = $i+2;
            }
            else{
                $i++;
            }
        }
        if( $ret==false )
        $str = substr($str,0,-1);
        return $str;
    }

    /**
     * 去除<符号前，>符号后的\n,\r字符，将回车换行或者换行替换为' ',多个空格替换为单个空格 
     * @param string $str 原始的字符串
     * @return string 转化后的字符串
     */
    public function cms_strip($str){
        $str = str_replace("\t"," ",$str);
        $str = preg_replace('/[\n|\r]+</msU','<',$str);
        $str = preg_replace('/[\n|\r| ]+</msU',' <',$str);
        $str = preg_replace('/>[\n|\r]+/','>',$str);
        $str = preg_replace('/>[\n|\r| ]+/','> ',$str);
        $str = str_replace("\r\n",' ',$str);
        $str = str_replace("\n",' ',$str);
        $str = preg_replace('/ +</msU'," <",$str);
        $str = preg_replace('/> +/',"> ",$str);
        return $str;
    }

   
}
?>
