<%strip%>
<%**************************
1������
pageType      ��ʾ����ʽ��Ĭ��Ϊ��һ����ʾ��ʽ
              1��һ����ʾpageUnit��Ԫ�أ���ʾ��һ�������һ��
              2��һ����ʾpageUnit*2��Ԫ�أ�����ʾ��һ�������һ��
pageUnit      ��־��ʾҳ��ĸ���(����ʡ�Ժ�ռλ��������'��һҳ'��'��һҳ')��pageType=1ʱĬ��Ϊ10��pageType=2ʱĬ��Ϊ5

href_prefix   urlǰ׺
href_suffix   url��׺

count         ����
rn            ÿҳ��ʾ��Ŀ
pn            ��ǰҳ��

2��ģ����������
include file="public/page.tpl" pn=$root.query.pageindex rn=$root.query.rn count=$root.items.count href='/?i='

**************************%>

<%*��ҳʱ��ת��ê��*%>
<%$href_suffix = ($href_suffix|cat:"#pageAchor")%>

<%if isset($count) && isset($pn) && isset($rn) && $count > 0 && $rn > 0%>

    <%$total = ceil( $count / $rn )%>
    <%$current = $pn%>
    
    <%if $pn <= $total%>
        <div id="page" class="clearfix">
        <%******************************************************
             1. <=10ҳ����չ�ַ�ʽ2һ�¡�
             2. >10ҳ���Թ�20ҳΪ������
                A.ǰ5ҳ����ʾ���һҳ��ҳ��  1 2 3 4 [5] 6 7 8 ... 20
                B.��6ҳ ~ ������6ҳ����ʾ��һҳ�����һҳ��ҳ��   1 ... 4 5 [6] 7 8 9 ... 20
                C.���5ҳ����ʾ��һҳ��ҳ��  1 ... 13 14 [15] 16 17 18 19 20
          ******************************************************%>
        <%if !isset($pageType) || $pageType == 1%>
            
            <%* $pageUnitĬ��Ϊ10 *%>
            <%if !isset($pageUnit)%><%$pageUnit = 10%><%/if%>
            
            <%* $pageUnitΪż����$pageTempΪ1��$pageUnitΪ������$pageTempΪ0 *%>
            <%$pageTemp = (1 + pow(-1, $pageUnit) )/ 2%>
            
            <%* �ӵ�$pageMҳ��ʼչ��'B'���*%>
            <%$pageM = 4 + floor( ($pageUnit - 4) / 2 ) - $pageTemp%>
            
            <%* 'A'���չ��$pageN��ҳ�� *%>
            <%$pageN = $pageUnit - 2%>
            
            <%* 'B'���$current֮ǰչ��$pageT1��ҳ�� ��$current֮��չ��$pageT2��ҳ�� *%>
            <%$pageT1 = $pageM - 4%>
            <%$pageT2 = $pageT1 + $pageTemp%>
            
            <%* չ����һҳ *%>
            <%if $current == 1%>
                <span class="previous_page">��һҳ</span>
            <%else%>
                <a class="previous_page" href="<%$href_prefix%><%$current - 1%><%$href_suffix%>">��һҳ</a>
            <%/if%>
            
            <%**************************************************** 
            * ҳ����ʾ����$pageUnit<=4(1�����ҳ������ʡ�ԺŹ��ĸ�λ��)
            * ������ҳ��$total<ҳ����ʾ��������ʾ����ҳ�뼴�� 
            ****************************************************%>
            <%if $pageUnit <= 4 || $total <= $pageUnit%>
                <%for $i=1 to ( $current - 1 )%>
                    <a href="<%$href_prefix%><%$i%><%$href_suffix%>"><%$i%></a>
                <%/for%>
                
                <span class="page_cur"><%$current%></span>
                
                <%for $j=( $current + 1 ) to $total%>
                    <a href="<%$href_prefix%><%$j%><%$href_suffix%>"><%$j%></a>
                <%/for%>
                
            <%**************************************************** 
            * ҳ����ʾ����$pageUnit>4,������ҳ��$total>ҳ����ʾ����
            * ���������(A��B��C)��ʾ 
            ****************************************************%>
            <%else%>
                <%* ���A:��ʾ���һҳ��ҳ��  1 2 3 4 [5] 6 7 8 ... 20 *%>
                <%if $current < $pageM%>
                    <%for $i=1 to ( $current - 1 )%>
                    <a href="<%$href_prefix%><%$i%><%$href_suffix%>"><%$i%></a>
                    <%/for%>
                    
                    <span class="page_cur"><%$current%></span>
                    
                    <%for $j=( $current + 1 ) to $pageN%>
                        <a href="<%$href_prefix%><%$j%><%$href_suffix%>"><%$j%></a>
                    <%/for%>
                    
                    <span class="page_more">...</span>
                    
                    <a href="<%$href_prefix%><%$total%><%$href_suffix%>"><%$total%></a>
                
                <%* ���B:��ʾ��һҳ�����һҳ��ҳ��   1 ... 4 5 [6] 7 8 9 ... 20 *%>
                <%elseif $current >= $pageM && $current <= ($total - $pageM)%>
            
                    <a href="<%$href_prefix%>1<%$href_suffix%>">1</a>
                    <span class="page_more">...</span>
        
                    <%for $i=($current - $pageT1) to ( $current - 1 )%>
                    <a href="<%$href_prefix%><%$i%><%$href_suffix%>"><%$i%></a>
                    <%/for%>
                    
                    <span class="page_cur"><%$current%></span>
                    
                    <%for $j=( $current + 1 ) to ($current + $pageT2)%>
                        <a href="<%$href_prefix%><%$j%><%$href_suffix%>"><%$j%></a>
                    <%/for%>
                    
                    <span class="page_more">...</span>
                    <a href="<%$href_prefix%><%$total%><%$href_suffix%>"><%$total%></a>
                
                <%* ���C:��ʾ��һҳ��ҳ��  1 ... 13 14 [15] 16 17 18 19 20 *%>
                <%elseif $current <= $total%>
                    
                    <a href="<%$href_prefix%>1<%$href_suffix%>">1</a>
                    <span class="page_more">...</span>
        
                    <%for $i=($total - $pageN + 1) to ( $current - 1 )%>
                    <a href="<%$href_prefix%><%$i%><%$href_suffix%>"><%$i%></a>
                    <%/for%>
                    
                    <span class="page_cur"><%$current%></span>
                    
                    <%for $j=( $current + 1 ) to $total%>
                        <a href="<%$href_prefix%><%$j%><%$href_suffix%>"><%$j%></a>
                    <%/for%>
                    
                <%/if%>
            <%/if%>
            
            <%* չ����һҳ *%>
            <%if $current == $total%>
                <span class="next_page">��һҳ</span>
            <%else%>
                <a class="next_page" href="<%$href_prefix%><%$current + 1%><%$href_suffix%>">��һҳ</a>
            <%/if%>
            <span id="goto">������
                <input type="text" id="pageNum" name="pn" length="4" />
                ҳ</span>
                <a id="go" href_prefix="<%$href_prefix%>" href_suffix="<%$href_suffix%>" pn="<%$pn%>" count="<%$total%>">ȷ��</a>
        <%******************************************************
             1. <=$pageUnit*2ҳ��ȫ��չ�֡�
             2. >$pageUnit*2ҳ����$pageUnit=5����20ҳΪ����,ֻչ��$pageUnit*2ҳ��
                1 2 3 4 5 [6]  7  8  9  10��ǰ��6ҳ����һ��λ��ʼ��Ϊ1��
                5 6 7 8 9 [10] 11 12 13 14����ǰҳʼ���ڵ�$pageUnit+1��λ�ã�
                11 12 13 14 15 16 17 18 19 20�����6ҳ�����һ��λ��ʼ��Ϊ20��
          ******************************************************%>
        <%elseif $pageType == 2%>
            <%if !isset($pageUnit)%><%$pageUnit = 5%><%/if%>
            <%if $total > 1%>
                <%if $current > $pageUnit%>
                    <%$first = $current - $pageUnit%>
                <%else%>
                    <%$first = 1%>
                <%/if%>
                <%if $current + $pageUnit - 1 <= $total%>
                    <%$last = $current + $pageUnit - 1%>
                <%else%>
                    <%$last = $total%>
                <%/if%>
                <%if $first == 1%>
                    <%$tempLast = $first + $pageUnit * 2 - 1%>
                    <%if $tempLast > $total%>
                        <%$last = $total%>
                    <%else%>
                        <%$last = $tempLast%>
                    <%/if%>
                <%/if%>
                <%if $last == $total && ( ( $last - $first + 1 ) < $pageUnit * 2 )%>
                    <%$tempFirst = $last - $pageUnit * 2 + 1%>
                    <%if $tempFirst < 1%>
                        <%$first = 1%>
                    <%else%>
                        <%$first = $tempFirst%>
                    <%/if%>
                <%/if%>
                
                <%if $current == 1%>
                    <span class="previous_page">��һҳ</span>
                <%else%>
                    <a class="previous_page" href="<%$href_prefix%><%$current - 1%><%$href_suffix%>">��һҳ</a>
                <%/if%>
                
                <%for $i=$first to ( $current - 1 )%>
                    <a href="<%$href_prefix%><%$i%><%$href_suffix%>"><%$i%></a>
                <%/for%>
                
                <span class="page_cur"><%$current%></span>
                
                <%for $j=( $current + 1 ) to $last%>
                    <a href="<%$href_prefix%><%$j%><%$href_suffix%>"><%$j%></a>
                <%/for%>
                
                <%if $current == $total%>
                    <span class="next_page">��һҳ</span>
                <%else%>
                    <a class="next_page" href="<%$href_prefix%><%$current + 1%><%$href_suffix%>">��һҳ</a>
                <%/if%>
                <span id="goto">������
                <input type="text" id="pageNum" name="pn" length="4" />
                ҳ</span>
                <a id="go" href="###" href_prefix="<%$href_prefix%>" href_suffix="<%$href_suffix%>" pn="<%$pn%>" count="<%$total%>">ȷ��</a>
            <%/if%>
        <%/if%>
        </div>
    <%/if%>
<%/if%>
<%/strip%>
