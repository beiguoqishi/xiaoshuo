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
    //û��escape�ַ�
    $encode_helper = new EncodeHelper();
    if( !isset($escape_string) || $escape_string=='' ){
        return $string;
    }
    $syntax_arr = explode(':',$escape_string);
    //�Ƿ��нض��﷨���xxx:length,����У������﷨��������
    $cutwordFlag = false;
    for( $j=0;$j<count($syntax_arr);$j++ ){
        if( $j!=0 ){
        	//�ҵ� xxx:������ʾ���н�ȡ���ԣ����������﷨
        	if( preg_match( '/^\d+$/', $syntax_arr[$j]) === 1 ){ 
        		unset( $syntax_real_arr );
        		$syntax_real_arr[] = intval($syntax_arr[$j]);
        		$cutwordFlag = true;
        		break;
        	}
            $syntax_real_arr[] = $syntax_arr[$j];
        }
    }
    
    //û���κ�ת�壬ֱ�����
    if( $syntax_real_arr==null || count($syntax_real_arr)==0 ){
       return $string;
    }
	//��ȡ����
	//echo "111string=$string<br>";
	if( $cutwordFlag === true ){
	    //echo "string=$string,length=".$syntax_real_arr[0]."<br>";
	    $string = $encode_helper->get_str_by_length($string,$syntax_real_arr[0], $etc);
	    return $string;
    }
    
	#ȡ���Ȳ���
	if( in_array('l', $syntax_real_arr) ){
		return strlen($string);
    }
    
    //�����utf8&&uת��,�Ƚ���utf8ת�壬�ٽ���urlת��
    if( in_array('utf8', $syntax_real_arr) && in_array('u',$syntax_real_arr) ){
    	return $encode_helper->utf8_url_encode($string);
    }
    //�����utf8����Ҫ��ʶ����ͼ�ַ������Ƚ���utf8ת�룬Ȼ�����ʵ���ַ�ת�룬�ٽ���urlת��
    if( in_array( 'utf8[entity]', $syntax_real_arr) && in_array('u',$syntax_real_arr) ){
        return $encode_helper->utf8_entity_url_encode($string);
    }
    //�����uת�壬����urlencodeת��
    if( in_array('u',$syntax_real_arr) ){
        return urlencode($string);
    }
    //h,j,x���У���j��h��ͬ
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
 * �ṩ�����������
 * @author qiuyonggang
 *
 */
class EncodeHelper{
    public function __construct(){
    }
    /**
     * jsת�壬��content��js�ַ�ת��
     * ' => \'
     * " => \"
     * \ => \\
     * \n => \n
     * \r => \r
     * ����\nת���ǽ�����ת���\n�ַ���\rת���ǽ��س�ת���\r�ַ�
     * @param string $content ��Ҫת����ı�
     * @return string ת�����ı� 
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
     *  xmlת�壬��content��xml�ַ�ת��
     *  < => &lt;
     *  > => &gt;
     *  & => &amp;
     *  ' => &#039;
     *  " => &quot;
     *  @param string $content ��Ҫת����ı�
     *  @return string ת�����ı�
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
     * onclickת��
     * \ => \\
     * & => &amp;
     * < => &lt;
     * > => &gt;
     * ' => \&#039
     * " => \&quot;
     * \n => \n
     * \r => \r
     * / => \/
     *  @param string $content ��Ҫת����ı�
     *  @return string ת�����ı�
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
     *  htmlת�壬��content��html�ַ�ת��
     *  < => &lt;
     *  > => &gt;
     *  ' => &#039;
     *  " => &quot;
     *  @param string $content ��Ҫת����ı�
     *  @return string ת�����ı�
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
     *  json+htmlת�壬ת��������£�
     * ' => \'
     * " => \"
     * \ => \\
     * \n => \n
     * \r => \r
     *  < => &lt;
     *  > => &gt;
     * ����\nת���ǽ�����ת���\n�ַ���\rת���ǽ��س�ת���\r�ַ�
     * @param string $content ��Ҫת����ı�
     * @return string ת�����ı�
     */
    public function js_html_encode($content){
        $content = js_encode($content);
        $content = str_replace('<','&lt;',$content);
        $content = str_replace('>','&gt;',$content);
        return $content;
    }

    /**
     *  �ȶ��ı���GBK��UTF8��ת�룬Ȼ����urlencode
     *  @param string $content ��Ҫת����ı�
     *  @return string ת�����ı�
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
     * �ض��ı�
     * @param string $title ��Ҫ�ضϵ�title
     * @param int $len �ضϵĳ���
     * @param string $etc �ضϺ󸽼ӵ�ʡ�Է���
     * @return string �ضϺ���ı�
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
     * ȥ���ַ�����������ֵĺ���������ַ�������ǰ�����֣��򷵻�ȥ����������ֵ��ַ�����
     * ���򷵻�ԭʼ�ַ���
     * @param string $str ԭʼ�ı�
     * @return string ����ַ���
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
     * ȥ��<����ǰ��>���ź��\n,\r�ַ������س����л��߻����滻Ϊ' ',����ո��滻Ϊ�����ո� 
     * @param string $str ԭʼ���ַ���
     * @return string ת������ַ���
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
