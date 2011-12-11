<%strip%>
<%**************************
1、参数
pageType      显示方方式，默认为第一种显示方式
              1：一共显示pageUnit个元素，显示第一集、最后一集
              2：一共显示pageUnit*2个元素，不显示第一集合最后一集
pageUnit      标志显示页码的个数(包括省略号占位，不包括'上一页'和'下一页')，pageType=1时默认为10，pageType=2时默认为5

href_prefix   url前缀
href_suffix   url后缀

count         总数
rn            每页显示数目
pn            当前页数

2、模板引用例：
include file="public/page.tpl" pn=$root.query.pageindex rn=$root.query.rn count=$root.items.count href='/?i='

**************************%>

<%*翻页时跳转到锚点*%>
<%$href_suffix = ($href_suffix|cat:"#pageAchor")%>

<%if isset($count) && isset($pn) && isset($rn) && $count > 0 && $rn > 0%>

    <%$total = ceil( $count / $rn )%>
    <%$current = $pn%>
    
    <%if $pn <= $total%>
        <div id="page" class="clearfix">
        <%******************************************************
             1. <=10页：与展现方式2一致。
             2. >10页（以共20页为例）：
                A.前5页：显示最后一页的页码  1 2 3 4 [5] 6 7 8 ... 20
                B.第6页 ~ 倒数第6页：显示第一页和最后一页的页码   1 ... 4 5 [6] 7 8 9 ... 20
                C.最后5页：显示第一页的页码  1 ... 13 14 [15] 16 17 18 19 20
          ******************************************************%>
        <%if !isset($pageType) || $pageType == 1%>
            
            <%* $pageUnit默认为10 *%>
            <%if !isset($pageUnit)%><%$pageUnit = 10%><%/if%>
            
            <%* $pageUnit为偶数，$pageTemp为1；$pageUnit为奇数，$pageTemp为0 *%>
            <%$pageTemp = (1 + pow(-1, $pageUnit) )/ 2%>
            
            <%* 从第$pageM页开始展现'B'情况*%>
            <%$pageM = 4 + floor( ($pageUnit - 4) / 2 ) - $pageTemp%>
            
            <%* 'A'情况展现$pageN个页码 *%>
            <%$pageN = $pageUnit - 2%>
            
            <%* 'B'情况$current之前展现$pageT1个页码 ，$current之后展现$pageT2个页码 *%>
            <%$pageT1 = $pageM - 4%>
            <%$pageT2 = $pageT1 + $pageTemp%>
            
            <%* 展现上一页 *%>
            <%if $current == 1%>
                <span class="previous_page">上一页</span>
            <%else%>
                <a class="previous_page" href="<%$href_prefix%><%$current - 1%><%$href_suffix%>">上一页</a>
            <%/if%>
            
            <%**************************************************** 
            * 页码显示个数$pageUnit<=4(1、最后页、两个省略号共四个位置)
            * 或者总页数$total<页码显示个数，显示所有页码即可 
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
            * 页码显示个数$pageUnit>4,或者总页数$total>页码显示个数
            * 分三种情况(A、B、C)显示 
            ****************************************************%>
            <%else%>
                <%* 情况A:显示最后一页的页码  1 2 3 4 [5] 6 7 8 ... 20 *%>
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
                
                <%* 情况B:显示第一页和最后一页的页码   1 ... 4 5 [6] 7 8 9 ... 20 *%>
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
                
                <%* 情况C:显示第一页的页码  1 ... 13 14 [15] 16 17 18 19 20 *%>
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
            
            <%* 展现下一页 *%>
            <%if $current == $total%>
                <span class="next_page">下一页</span>
            <%else%>
                <a class="next_page" href="<%$href_prefix%><%$current + 1%><%$href_suffix%>">下一页</a>
            <%/if%>
            <span id="goto">跳至第
                <input type="text" id="pageNum" name="pn" length="4" />
                页</span>
                <a id="go" href_prefix="<%$href_prefix%>" href_suffix="<%$href_suffix%>" pn="<%$pn%>" count="<%$total%>">确定</a>
        <%******************************************************
             1. <=$pageUnit*2页：全部展现。
             2. >$pageUnit*2页（以$pageUnit=5，共20页为例）,只展现$pageUnit*2页：
                1 2 3 4 5 [6]  7  8  9  10（前面6页，第一个位置始终为1）
                5 6 7 8 9 [10] 11 12 13 14（当前页始终在第$pageUnit+1个位置）
                11 12 13 14 15 16 17 18 19 20（最后6页，最后一个位置始终为20）
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
                    <span class="previous_page">上一页</span>
                <%else%>
                    <a class="previous_page" href="<%$href_prefix%><%$current - 1%><%$href_suffix%>">上一页</a>
                <%/if%>
                
                <%for $i=$first to ( $current - 1 )%>
                    <a href="<%$href_prefix%><%$i%><%$href_suffix%>"><%$i%></a>
                <%/for%>
                
                <span class="page_cur"><%$current%></span>
                
                <%for $j=( $current + 1 ) to $last%>
                    <a href="<%$href_prefix%><%$j%><%$href_suffix%>"><%$j%></a>
                <%/for%>
                
                <%if $current == $total%>
                    <span class="next_page">下一页</span>
                <%else%>
                    <a class="next_page" href="<%$href_prefix%><%$current + 1%><%$href_suffix%>">下一页</a>
                <%/if%>
                <span id="goto">跳至第
                <input type="text" id="pageNum" name="pn" length="4" />
                页</span>
                <a id="go" href="###" href_prefix="<%$href_prefix%>" href_suffix="<%$href_suffix%>" pn="<%$pn%>" count="<%$total%>">确定</a>
            <%/if%>
        <%/if%>
        </div>
    <%/if%>
<%/if%>
<%/strip%>
